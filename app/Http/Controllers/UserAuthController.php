<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use App\Models\AccountCustomer;
use Illuminate\Support\Facades\Session;
use Auth;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }


    public function login_post(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $account = AccountCustomer::where('email', $email)->first();
        if ($account) {
            if (Hash::check($password, $account->password)) {
                Session::put('account', $account);
                Session::put('login', TRUE);
                return redirect('/');
            } else {
                return redirect('/login')->with('Error', 'Email or Password incorrect');
            }
        } else {
            return redirect('/login')->with('Error', 'Email or Password incorrect');
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect('/');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function register_post(Request $request)
    {
        $message = [
            'required' => 'This column must be filled',
            'unique' => 'Email already registered',
        ];
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:account_customer',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'sex' => 'required',
            'phone_number' => 'required'
        ], $message);

        // insert to account_customer table
        $account = new \App\Models\AccountCustomer;
        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->save();

        // insert to customer table
        $request->request->add(['account_customer_id' => $account->id]);
        \App\Models\Customer::create($request->all());

        return redirect('/login')->with('Success', 'Sign Up Success');
    }
}
