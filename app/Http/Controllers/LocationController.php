<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Session;

class LocationController extends Controller
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
        $locations = Location::all();
        return view('location.index')->withLocations($locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
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

        $location = new Location;
        $location->name = $request->name;
        $location->introduce = $request->introduce;
        $location->save();

        Session::flash('success', 'The new location was sucessfully save!');
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        return view('location.show')->withlocation($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('location.edit')->withlocation($location);
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

        $location = Location::find($id);
        $location->name = $request->input('name');
        $location->introduce = $request->input('introduce');
        $location->save();

        Session::flash('success', 'The new location was sucessfully save!');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        Session::flash('success', 'The location was successfully deleted.');
        return redirect()->route('location.index');
    }
}