<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::all();

        return view('user.index', ['products' => $products]);
    }

    public function product_detail($id)
    {
        $product = Products::find($id);
        return view('user.product_detail', ['product' => $product]);
    }
}
