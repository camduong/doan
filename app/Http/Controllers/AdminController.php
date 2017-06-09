<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Location;
use App\Hotel;
use App\User;
use App\Vehicle;
use App\Order;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all()->count();
        $vehicles = Vehicle::all()->count();
        $hotels = Hotel::all()->count();
        $locations = Location::all()->count();
        $orders = Order::all()->count();
        $users = User::all()->count();
        return view('admin/index', ['tours' => $tours, 'vehicles' => $vehicles, 'hotels' => $hotels, 'locations' => $locations, 'orders' => $orders, 'users' => $users]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin');   
    }
}
