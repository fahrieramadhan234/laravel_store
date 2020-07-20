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

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id = [
                    'product_name' => $product->product_name,
                    'quantity' => $request->qty,
                    'product_price' => $product->product_price,
                    'product_pict' => $product->product_pict
                ]
            ];

            session()->put('cart', $cart);

            return redirect('/')->with('Success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            'product_name' => $product->product_name,
            'quantity' => $request->qty,
            'product_price' => $product->product_price,
            'product_pict' => $product->product_pict
        ];
        session()->put('cart', $cart);

        return redirect('/')->with('Success', 'Product added to cart successfully!');
    }

    public function cart()
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }
        $account = Session::get('account');
        return view('user.cart', ['account' => $account]);
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
