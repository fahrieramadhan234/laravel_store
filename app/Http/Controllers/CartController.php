<?php

namespace App\Http\Controllers;

use App\Models\ProductPicture;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

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

    public function addCart(Request $request, $id)
    {
        if (!Session::has('login')) {
            return back()->with('Warning', 'You must login first');
        }
        $product = Products::find($id);
        $product_picture = ProductPicture::where('product_id', $id)->first();

        // dd($product_picture->product_pict);

        if (!$product) {
            abort(404);
        }
        $cart = Session::get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'product_id' => $product->product_id,
                    'product_name' => $product->product_name,
                    'quantity' => (int)$request->qty,
                    'product_price' => $product->product_price,
                    'product_picture' => $product_picture
                ]
            ];
            Session::put('cart', $cart);
            return redirect('/')->with('Success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += (int)$request->qty;
            Session::put('cart', $cart);
            return redirect('/')->with('Success', 'Product added to cart successfully!');
        }

        $cart[$id] = array(
            'product_id' => $product->product_id,
            'product_name' => $product->product_name,
            'quantity' => (int)$request->qty,
            'product_price' => $product->product_price,
            'product_picture' => $product_picture
        );
        Session::put('cart', $cart);
        return redirect('/')->with('Success', 'Product added to cart successfully!');
    }

    public function plus_cart($id)
    {
        $cart = Session::get('cart');
        $product = Products::find($id);

        if ($cart[$id]['quantity'] == $product->product_stock) {
            return redirect('/cart')->with('Error', "Quantity tidak bisa melebihi stock produk");
        }

        $cart[$id]['quantity'] += 1;
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function minus_cart($id)
    {
        $cart = Session::get('cart');

        if ($cart[$id]['quantity'] == 1) {
            unset($cart[$id]);
            Session::put('cart', $cart);
            return redirect('/cart')->with('Success', 'Product deleted from cart successfully!');
        }

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
}
