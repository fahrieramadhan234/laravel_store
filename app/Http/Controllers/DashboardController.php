<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class DashboardController extends Controller
{
    public function index()
    {
        $products = \App\Models\Products::all();
        $brands = \App\Models\Brands::all();
        $categories = \App\Models\Categories::all();
        return view('admin.dashboard.index', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }
}
