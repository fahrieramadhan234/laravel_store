<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function payment()
    {

        // dd(Session::get('address'));
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            return view('user.checkout', ['account' => $account]);
        }
        return view('user.checkout');
    }

    public function add_address(Request $request)
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }

        $address = Session::get('address');

        if (!$address) {
            Session::put('address', $request->all());
            return redirect('/checkout/payment');
        }
    }

    public function delete_session()
    {
        session()->forget('address');
        return redirect('/checkout/payment');
    }
}
