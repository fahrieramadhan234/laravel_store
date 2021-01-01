<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();

        return view('admin.customer.index', ['customer' => $customer]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $first_name = ucfirst($request->first_name);
        $last_name = ucfirst($request->last_name);
        $request->request->add(['first_name' => $first_name, 'last_name' => $last_name]);
        $customer = Customer::create($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = time() . "-" . $avatar->getClientOriginalName();
            $avatar->move('backend/images/customer', $avatar_name);
            $customer->avatar = $avatar_name;
            $customer->save();
        }

        return redirect('/admin/customer')->with('Success', 'Customer has been added');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = time() . "-" . $avatar->getClientOriginalName();
            $avatar->move('backend/images/customer', $avatar_name);
            $customer->avatar = $avatar_name;
            $customer->save();
        }

        return redirect('/admin/customer')->with('Success', 'Customer has been updated');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/admin/customer')->with('Success', 'Customer has been deleted');
    }

    public function profile($id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customer.profile', ['customer' => $customer]);
    }
}
