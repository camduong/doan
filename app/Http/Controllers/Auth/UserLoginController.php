<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //Validate the form data
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required|min:6'
        ]);

        //Attempt to log the user in
        if(Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
             //If successful, then redirect to their intended location
             return redirect('/home');
        }
        
        //If unsuccessful, then redirect back to the login with the form data
        $errors = ['email' => trans('auth.failed')];
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors($errors);
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');   
    }
}
