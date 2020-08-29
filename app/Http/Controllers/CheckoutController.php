<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function payment()
    {
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            // dd($products[0]->product_picture[0]->product_pict);
            // $pict = $products[0]->product_picture[0]->product_pict;
            // dd(Session::all());
            return view('user.checkout', ['account' => $account]);
        }
        return view('user.checkout');
    }
}
