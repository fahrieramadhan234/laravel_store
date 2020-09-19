<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ProductPicture;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $products = Products::all()->where('product_stock', '>', 0);
        $categories = Categories::all();
        if (Session::has('login')) {
            $account = Session::get('account');
            $cart = Session::get('cart');
            return view('user.index', ['products' => $products, 'account' => $account, 'categories' => $categories]);
        }

        // $products->map(function ($product) {
        //     $product['product_picture'];
        // });

        // dd($products[0]['product_pict']);
        // return response()->json(['products' => $products]);

        return view('user.index', ['products' => $products, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $products = Products::where('product_name', 'LIKE', '%' . $request->q . '%')->get();
        $categories = Categories::all();
        if (Session::has('login')) {
            $account = Session::get('account');

            return view('user.search_results', ['account' => $account, 'products' => $products, 'categories' => $categories]);
        }

        return view('user.search_results', ['products' => $products, 'categories' => $categories]);
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
