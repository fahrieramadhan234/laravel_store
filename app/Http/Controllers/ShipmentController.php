<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Steevenz\Rajaongkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Http;

class ShipmentController extends Controller
{

    protected $raja_ongkir_url;
    protected $api_key;

    public function __construct()
    {
        $this->api_key = config('services.raja_ongkir.key'); // Get Api key from .env
        $this->raja_ongkir_url = 'https://api.rajaongkir.com/starter/'; // Url for raja ongkir
    }

    public function checkout()
    {
        $province = $this->getProvince();
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        } elseif (!Session::has('cart')) {
            return back()->with('Warning', 'Your cart is empty!');
        }
        $account = Session::get('account');
        return view('user.checkout', ['account' => $account, 'province' => $province]);
    }

    public function getProvince()
    {

        $response = Http::get($this->raja_ongkir_url . 'province?key=' . $this->api_key);
        $province = $response['rajaongkir']['results'];
        return $province;
    }

    public function getCity($id)
    {

        $response = Http::get($this->raja_ongkir_url . 'city?key=' . $this->api_key . '&province=' . $id);
        $rj = $response['rajaongkir']['results'];
        echo json_encode($rj);
    }

    public function getOngkir($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->raja_ongkir_url . "cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->api_key . ""
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }

    public function getDistrict($id)
    {
        $district = District::where('city_id', $id)->get();
        echo json_encode($district);
    }

    public function getVillage($id)
    {
        $village = Village::where('district_id', $id)->get();
        echo json_encode($village);
    }


    public function add_address(Request $request)
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }


        Session::get('address');

        $address = [
            'nama_penerima' => $request->nama_penerima,
            'no_telp' => $request->no_telp,
            'province' => $request->province,
            'province_name' => $request->province_name,
            'city' => $request->city,
            'city_name' => $request->city_name,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
        ];

        Session::put('address', $address);

        // Session::put('address', $request->all());
        return redirect('/checkout/shipment');
    }

    public function delete_session()
    {
        session()->forget('address');
        return redirect('/checkout/shipment');
    }
}
