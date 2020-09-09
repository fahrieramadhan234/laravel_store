<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $category_name = ucfirst($request->category_name);
        $request->request->add(['category_name' => $category_name]);
        if (Categories::where('category_name', $category_name)->exists()) {
            return redirect('/admin/categories')->with('Error', 'Category already exists');
        }
        Categories::create($request->all());

        return redirect('/admin/categories')->with('Success', 'Category has been added');
    }

    public function edit(Request $request, $id)
    {
        $category_name = ucfirst($request->value);
        $category = \App\Models\Categories::find($id);
        $category->update([$request->pk, 'category_name' => $category_name]);
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        if ($category->products()->where('category_id', $id)->exists()) {
            return redirect('/admin/categories')->with('Error', 'Sorry, you can\'t delete this category');
        }

        $category->delete();

        return redirect('/admin/categories')->with('Success', 'Category has been Deleted');
    }
}
