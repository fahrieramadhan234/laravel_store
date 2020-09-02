<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class ShipmentController extends Controller
{

    public function getProvince()
    {
        // dd(Session::get('address'));
        $provinces = Province::pluck('name', 'id');
        $city = City::where('province_id', 12)->get();
        if (Session::has('login')) {
            $account = Session::get('account');
            return view('user.checkout', ['account' => $account, 'provinces' => $provinces]);
        }
        return view('user.checkout');
    }

    public function getCity($id)
    {
        $city = City::where('province_id', $id)->get();
        echo json_encode($city);
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
