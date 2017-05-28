<?php

namespace App\Http\Controllers;

use App\Location;
use App\Regions;
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
        $regions = Regions::all();
        $regi = [];
        foreach($regions as $region)
        {
            $regi[$region->id] = $region->name;
        }
        return view('location.index')->withLocations($locations)
                                     ->withRegions($regi);
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
        $location->slug = $request->slug;
        $location->region_id = $request->region_id;
        $location->introduce = $request->introduce;
        $location->save();

        Session::flash('success', 'The new location was sucessfully save!');
        return redirect()->route('location.index');
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
        $regions = Regions::all();
        $regi = [];
        foreach($regions as $region)
        {
            $regi[$region->id] = $region->name;
        }
        return view('location.edit')->withlocation($location)
                                    ->withRegions($regi);
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
        $location->slug = $request->input('slug');
        $location->region_id = $request->input('region_id');
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