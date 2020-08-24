<?php

namespace App\Http\Controllers;

use App\Models\ProductPicture;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::all()->where('product_stock', '>', 0);
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            // dd($products[0]->product_picture[0]->product_pict);
            // $pict = $products[0]->product_picture[0]->product_pict;
            // dd(Session::all());
            return view('user.index', ['products' => $products, 'account' => $account]);
        }

        return view('user.index', ['products' => $products]);
    }


    public function product_detail($id)
    {
        $product = Products::find($id);
        if (Session::has('login')) {
            $account = Session::get('account');
            return view('user.product_detail', ['product' => $product, 'account' => $account]);
        }
        return view('user.product_detail', ['product' => $product]);
    }
}
