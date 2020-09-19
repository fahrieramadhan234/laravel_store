<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $address = Session::get('address');
        $cart = Session::get('cart');
        $account = Session::get('account')->customer;
        // dd($address, $cart, $customer);
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        } elseif (!Session::has('cart')) {
            return back()->with('Warning', 'Your cart is empty!');
        }

        return view('user.payment', ['account' => $account]);
    }
}
