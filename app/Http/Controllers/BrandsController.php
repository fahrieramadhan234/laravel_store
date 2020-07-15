<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return view('admin.brands.index', ['brands' => $brands]);
    }

    public function create(Request $request)
    {
        $brand_name = ucfirst($request->brand_name);
        $brand_code = strtolower($request->brand_name);
        $request->request->add(['brand_code' => $brand_code, 'brand_name' => $brand_name]);
        if (Brands::where('brand_name', $brand_name)->exists()) {
            return redirect('/admin/brands')->with('Error', 'Brand already exists');
        }
        $brand = Brands::create($request->all());
        if ($request->hasFile('brand_logo')) {
            $logo = $request->file('brand_logo');
            $extension = $request->file('brand_logo')->getClientOriginalExtension();
            $logo_name = time() . "-" . $brand_code . "-logo" . "." . $extension;
            $logo->move('backend/images/products-logo/', $logo_name);
            $brand->brand_logo = $logo_name;
            $brand->save();
        }

        return redirect('/admin/brands')->with('Success', 'Brand has been added');
    }

    public function edit($id)
    {
        $brand = Brands::find($id);

        return view('admin.brands.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id)
    {
        $brand = Brands::find($id);
        $brand_name = ucfirst($request->brand_name);
        $brand_code = strtolower($request->brand_name);
        $request->request->add(['brand_code' => $brand_code, 'brand_name' => $brand_name]);
        // dd($request->all());
        $brand->update($request->all());
        if ($request->hasFile('brand_logo')) {
            $logo = $request->file('brand_logo');
            $logo_name = time() . "-" . $brand_code . "-logo";
            $logo->move('backend/images/products-logo/', $logo_name);
            $brand->brand_logo = $logo_name;
            $brand->save();
        }
        return redirect('/admin/brands')->with('Success', 'Brand has been updated');
    }

    public function delete($id)
    {
        $brand = Brands::find($id);
        if ($brand->products()->where('brand_id', $id)->exists()) {
            return redirect('/admin/brands')->with('Error', 'Sorry, you can\'t delete this brand');
        }
        $brand->delete();

        return redirect('/admin/brands')->with('Success', 'Brand has been Deleted');
    }
}
