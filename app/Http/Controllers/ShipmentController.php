<?php

namespace App\Http\Controllers;

use App\Models\Products;
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

    public function getProvince()
    {
        
        $response = Http::get($this->raja_ongkir_url.'province?key='.$this->api_key);
        $rj = $response['rajaongkir']['results'];
        $provinces = Province::pluck('name', 'id');
        if (Session::has('login')) {
            $account = Session::get('account');
            return view('user.checkout', ['account' => $account, 'provinces' => $provinces, 'rj' => $rj]);
        }
        return view('user.checkout');
    }

    public function getCity($id)
    {

        $response = Http::get($this->raja_ongkir_url.'city?key='.$this->api_key.'&province=' . $id);
        $rj = $response['rajaongkir']['results'];
        // dd($rj);
        $city = City::where('province_id', $id)->get();
        echo json_encode($rj);
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

        $province = Province::where('id', $request->province)->get();
        $city = City::where('id', $request->city)->get();
        $district = District::where('id', $request->district)->get();
        $village = Village::where('id', $request->village)->get();

        $request->merge([
            'province' => $province[0]->name,
            'city' => $city[0]->name,
            'district' => $district[0]->name,
            'village' => $village[0]->name,
        ]);
        // dd($request->all());
        // dd($province[0]->name);
        

        Session::get('address');

        Session::put('address', $request->all());
        return redirect('/checkout/shipment');
    }

    public function delete_session()
    {
        session()->forget('address');
        return redirect('/checkout/shipment');
    }
}
