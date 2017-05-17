<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Location;
use Illuminate\Http\Request;
use Session;

class HotelCOntroller extends Controller
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
        $hotels = Hotel::all();
        $locations = Location::all();
        $loca = [];
        foreach($locations as $location)
        {
            $loca[$location->id] = $location->name;
        }
        return view('hotel.index')->withHotels($hotels)
                                  ->withLocations($loca);
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
            'address'  => 'required',
            'phone' => 'required'
        ));

        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->phone = $request->phone;
        $hotel->location_id = $request->location_id;
        $hotel->save();

        Session::flash('success', 'The new hotel was sucessfully save!');
        return redirect()->route('hotel.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        $locations = Location::all();
        $loca = [];
        foreach($locations as $location)
        {
            $loca[$location->id] = $location->name;
        }
        return view('hotel.edit')->withHotel($hotel)->withLocations($loca);
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
            'address'  => 'required',
            'phone' => 'required'
        ));

        $hotel = Hotel::find($id);
        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->phone = $request->input('phone');
        $hotel->location_id = $request->input('location_id');
        $hotel->save();

        Session::flash('success', 'The new hotel was sucessfully save!');
        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        Session::flash('success', 'The hotel was successfully deleted.');
        return redirect()->route('hotel.index');
    }
}