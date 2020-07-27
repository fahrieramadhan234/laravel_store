<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }
        $product = Products::find($id);
        $cart = Session::get('cart');

        if (!$product) {
            abort(404);
        }

        // if (!$cart) {
        $cart[$id] = array(
            'product_id' => $product->product_id,
            'product_name' => $product->product_name,
            'quantity' => (int)$request->qty,
            'product_price' => $product->product_price,
            'product_pict' => $product->product_pict
        );
        Session::put('cart', $cart);

        return redirect('/')->with('Success', 'Product added to cart successfully!');
        // }

        // $cart[$id] = [
        //     'product_name' => $product->product_name,
        //     'quantity' => $request->qty,
        //     'product_price' => $product->product_price,
        //     'product_pict' => $product->product_pict
        // ];
        // session()->put('cart', $cart);

        // return redirect('/')->with('Success', 'Product added to cart successfully!');
    }

    public function plus_cart($id)
    {
        $cart = Session::get('cart');

        $cart[$id]['quantity'] += 1;
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function minus_cart($id)
    {
        $cart = Session::get('cart');

        $cart[$id]['quantity'] -= 1;

        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function cart_delete($id)
    {
        $cart = Session::get('cart');

        unset($cart[$id]);
        Session::put('cart', $cart);

        return redirect('/cart')->with('Success', 'Product deleted from cart successfully!');
    }

    public function cart()
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }
        $account = Session::get('account');
        $cart = session('cart');
        // dd($cart);
        return view('user.cart', ['account' => $account, 'cart' => $cart]);
    }
}
