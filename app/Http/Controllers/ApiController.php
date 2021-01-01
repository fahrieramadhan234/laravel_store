<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function edit(Request $request, $id)
    {
        $category = \App\Models\Categories::find($id);
        $category->update([$request->pk, 'category_name' => $request->value]);
    }
}
