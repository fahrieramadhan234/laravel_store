<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::all();
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            // dd(Session::all());
            return view('user.index', ['products' => $products, 'account' => $account]);
        }

        return view('user.index', ['products' => $products]);
    }

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
            'quantity' => $request->qty,
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

    public function cart_delete($id)
    {
        $cart = Session::get('cart');
        // $product = $cart[$id]['product_id'];
        // dd($cart[$id]);  

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
