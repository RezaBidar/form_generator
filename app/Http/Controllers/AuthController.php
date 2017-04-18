<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth ;
use Hash;
use Session;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended(route('form.index'));
        }
        else{
            Session::flash('error' , 'نام کاربری یا کلمه ی عبور اشتباه است');
            return redirect('login') ;
        }
    }

    /**
     * Show sing in page
     */
    public function login()
    {
    	return view('login');
    }

    /**
     * Logout user and redirect it to login page
     */
    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|min:3|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect('login');
    }
}
