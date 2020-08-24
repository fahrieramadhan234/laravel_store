<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\ProductPicture;
use illuminate\Support\Facades\File;
use PDF;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $brands = Brands::all();
        $categories = Categories::all();

        return view('admin.products.index', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }


    //Input new product to database
    public function create(Request $request)
    {

        // dd($product_pict);

        $message = [
            'required' => 'This field is required',
            'mimes' => 'Format foto must be jpeg or png',
            'integer' => 'Value must be numeric'
        ];

        $this->validate($request, [
            'product_name' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_price' => 'required|integer',
            'product_stock' => 'required|integer',
            'product_desc' => 'required',
            // 'product_pict' => 'required|mimes:jpg,jpeg,png',
        ], $message);

        $product = new \App\Models\Products;
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->product_desc = $request->product_desc;
        $product->save();


        $product_pict = $request->file('product_pict');

        // dd($product_pict);
        foreach ($product_pict as $pro_pict) {
            $product_picture = new \App\Models\ProductPicture;
            $request->request->add(['product_id' => $product->product_id]);
            $get_name = $pro_pict->getClientOriginalName();
            $pict_name = time() . '-' . $get_name;
            $pro_pict->move('backend/images/products_image/', $pict_name);
            $product_picture->product_pict = $pict_name;
            $product_picture->product_id = $request->product_id;
            $product_picture->save();
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

    //Update product to database
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        // dd($request->$pict_name);
        if ($request->hasFile('product_pict')) {
            $pict = $request->file('product_pict');
            $slug = Str::slug($request->product_name) . "." . $pict->getClientOriginalExtension();
            $pict_name = time() . '-' . $slug;
            $pict->move('backend/images/products_image/', $pict_name);
            $product->product_pict = $pict_name;
            $product->save();
        }

        return redirect('/admin/products')->with('Success', 'Product has been updated');
    }


    //Delete product from database
    public function delete($id)
    {
        $product = Products::find($id);
        $product_picture = ProductPicture::where('product_id', $id);
        $picture_name = $product_picture->pluck('product_pict');
        // dd($product_picture);
        foreach ($picture_name as $pict_name) {
            $pict_dir = public_path('backend/images/products_image/' . $pict_name);
            if (file_exists($pict_dir)) {
                unlink($pict_dir);
            }
        }

        $product_picture->delete();
        $product->delete();

        return redirect('/admin/products')->with('Success', 'Product has been deleted');
    }

    public function detail($id)
    {
        $product = Products::find($id);
        $product_picture = ProductPicture::where('product_id', $id);
        $picture_name = $product_picture->pluck('product_pict');
        $pict = public_path() . '/backend/images/products_image/' . $picture_name;
        // dd($picture_name);
        if ($product->product_stock >= 30) {
            $stock = "Ready Stok";
        } elseif ($product->product_stock >= 1 && $product->product_stock < 30) {
            $stock = "Limited";
        } else {
            $stock = "Out of Stock";
        }
        return view('admin.products.detail', ['product' => $product, 'stock' => $stock, 'picture_name' => $picture_name]);
    }

    public function print_pdf()
    {
        $products = Products::all();

        $pdf = PDF::loadview('admin.products.products_pdf', ['products' => $products]);
        return $pdf->download(date("l jS \of F Y h:i:s A ") . 'products-report.pdf');
    }
}
