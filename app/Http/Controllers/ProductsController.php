<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $brands = Brands::all();
        $categories = Categories::all();
        return view('admin.products.index', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $product = Products::create($request->all());
        if ($request->hasFile('pict')) {
            $pict = $request->file('product_pict');
            $pict_name = time() . '-' . $request->file('product_pict')->getClientOriginalName();
            $pict->move('backend/product_image/', $pict_name);
            $product->product_pict = $pict_name;
            $product->save();
        }

        return redirect('/admin/products')->with('Success', 'Product has been added');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        $brands = Brands::all();
        $categories = Categories::all();

        return view('admin.products.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        // dd($request->$pict_name);
        if ($request->hasFile('product_pict')) {
            $pict = $request->file('product_pict');
            $pict_name = $pict->getClientOriginalName();
            $pict->move('backend/images/products_image/', $pict_name);
            $product->product_pict = $pict_name;
            $product->save();
        }

        return redirect('/admin/products')->with('Success', 'Product has been updated');
    }

    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();

        return redirect('/admin/products')->with('Success', 'Product has been deleted');
    }

    public function detail($id)
    {
        $product = Products::find($id);

        return view('admin.products.detail', ['product' => $product]);
    }
}
