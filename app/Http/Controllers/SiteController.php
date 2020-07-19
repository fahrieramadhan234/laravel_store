<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Customer;
use App\Models\AccountCustomer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::all();
        if (Session::has('login')) {
            $account = Session::get('account');
            return view('user.index', ['products' => $products, 'account' => $account]);
        }
        return view('user.index', ['products' => $products]);
    }

    public function addCart($id)
    {
        # code...
    }

    public function product_detail($id)
    {
        $product = Products::find($id);
        return view('user.product_detail', ['product' => $product]);
    }
}
