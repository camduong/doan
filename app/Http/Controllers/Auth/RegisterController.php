<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'p_code' => 'required|max:20',
            'birthday' => 'required|before:01/01/2017',
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'address' => $data['address'],
            'phone' => '+84'.$data['phone'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'p_code' => $data['p_code'],
            'birthday' => date('Y/m/d',strtotime($data['birthday'])),
            'roles' => 'user',
            'password' => bcrypt($data['password']),
        ]);
    }
}
