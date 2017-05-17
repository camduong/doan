<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Vehicle;
use Session;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.index')->withVehicles($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'introduce'  => 'required'
        ));

        $vehicle = new Vehicle;
        $vehicle->name = $request->name;
        $vehicle->introduce = $request->introduce;
        $vehicle->save();

        Session::flash('success', 'The new vehicle was sucessfully save!');
        return redirect()->route('vehicle.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicle.edit')->withVehicle($vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, array(
            'name' => 'required',
            'introduce'  => 'required'
        ));

        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->introduce = $request->input('introduce');
        $vehicle->save();

        Session::flash('success', 'The new vehicle was sucessfully save!');
        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        Session::flash('success', 'The vehicle was successfully deleted.');
        return redirect()->route('vehicle.index');
    }
}
