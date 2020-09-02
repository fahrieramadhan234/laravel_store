<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class DependentDrowdownController extends Controller
{

    public function getProvince()
    {
        $provinces = Province::pluck('name', 'id');

        return view('user.checkout', [
            'provinces' => $provinces,
        ]);
    }
    
    public function store(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluk('name', 'id');
        return response()->json($cities);
    }
}
