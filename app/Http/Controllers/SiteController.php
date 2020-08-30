<?php

namespace App\Http\Controllers;

use App\Models\Address\Provinces;
use App\Models\ProductPicture;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        $address = Provinces::all();
        // dd($address);
        $products = Products::all()->where('product_stock', '>', 0);
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            return view('user.index', ['products' => $products, 'account' => $account]);
        }

        return view('user.index', ['products' => $products]);
    }


    public function product_detail($id)
    {
        $product = Products::find($id);
        $product_picture = ProductPicture::where('product_id', $id);
        $product_picture2 = ProductPicture::where('product_id', $id)->get();
        if (Session::has('login')) {
            $account = Session::get('account');
            return view('user.product_detail', [
                'product' => $product,
                'account' => $account,
                'main_picture' => $product_picture->first(),
                'product_picture' => $product_picture2
            ]);
        }
        // dd($product_picture2);
        return view(
            'user.product_detail',
            [
                'product' => $product,
                'main_picture' => $product_picture->first(),
                'product_picture' => $product_picture2
            ]
        );
    }
}
