<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Tour;
use App\Hotel;
use App\Location;
use App\Vehicle;
use Session;
use Image;
use Purifier;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        $hotels = Hotel::all();
        $hot = [];
        foreach($hotels as $hotel)
        {
            $hot[$hotel->id] = $hotel->name;
        }
        $locations = Location::all();
        $loca = [];
        foreach($locations as $location)
        {
            $loca[$location->id] = $location->name;
        }
        $vehicles = Vehicle::all();
        $veh = [];
        foreach($vehicles as $vehicle)
        {
            $veh[$vehicle->id] = $vehicle->name;
        }
        return view('tour.index')->withTours($tours)
                                ->withHotels($hot)
                                ->withLocations($loca)
                                ->withVehicles($veh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store in the database
        $tour = new Tour;

        $tour->name = $request->name;
        $tour->slug = $request->slug;
        $tour->number = $request->number;
        $tour->hotel_id = $request->hotel_id;
        $tour->depart_location_id = $request->depart_location_id;
        $tour->dest_location_id = $request->dest_location_id;
        $tour->type = $request->type;
        $tour->vehicle_id = $request->vehicle_id;
        $tour->depart_date = date('Y/m/d',strtotime($request->depart_date));
        $tour->return_date = date('Y/m/d',strtotime($request->return_date));
        $tour->day = (strtotime($tour->return_date) - strtotime($tour->depart_date)) / (60 * 60 * 24) + 1;
        $tour->price = $request->price;
        $tour->schedule = Purifier::clean($request->schedule);
        if($request->hasFile('tour_image'))
        {
            $image = $request->file('tour_image');
            if($image->getClientOriginalExtension() == 'jpg' or $image->getClientOriginalExtension() == 'png')
                $filename = $tour->slug . '.' . $image->getClientOriginalExtension();
            else
                $filename = $tour->slug . '.' . $image->encode('png');
            $location = public_path("img/". $filename);
            Image::make($image)->resize(400,250)->save($location);
        }
        $tour->save();
        
        Session::flash('success', 'The tour was sucessfully save!');

        //redirect to another page
        return redirect()->route('tour.show', $tour->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);
        return view('tour.show')->withTour($tour);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        $hotels = Hotel::all();
        $hot = [];
        foreach($hotels as $hotel)
        {
            $hot[$hotel->id] = $hotel->name;
        }
        $locations = Location::all();
        $loca = [];
        foreach($locations as $location)
        {
            $loca[$location->id] = $location->name;
        }
        $vehicles = Vehicle::all();
        $veh = [];
        foreach($vehicles as $vehicle)
        {
            $veh[$vehicle->id] = $vehicle->name;
        }

        return view('tour.edit')->withTour($tour)
                                ->withHotels($hot)
                                ->withLocations($loca)
                                ->withVehicles($veh);
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
        //save the data to the database
        $tour = Tour::find($id);

        $tour->name = $request->input('name');
        $tour->slug = $request->input('slug');
        $tour->number = $request->input('number');
        $tour->hotel_id = $request->input('hotel_id');
        $tour->depart_location_id = $request->input('depart_location_id');
        $tour->dest_location_id = $request->input('dest_location_id');
        $tour->type = $request->input('type');
        $tour->vehicle_id = $request->input('vehicle_id');
        $tour->depart_date = date('Y/m/d',strtotime($request->input('depart_date')));
        $tour->return_date = date('Y/m/d',strtotime($request->input('return_date')));
        $tour->day = (strtotime($tour->return_date) - strtotime($tour->depart_date)) / (60 * 60 * 24) + 1;
        $tour->price = $request->input('price');
        $tour->schedule = Purifier::clean($request->input('schedule'));
        if($request->hasFile('tour_image'))
        {
            $image = $request->file('tour_image');
            if($image->getClientOriginalExtension() == 'jpg' or $image->getClientOriginalExtension() == 'png')
                $filename = $tour->slug . '.' . $image->getClientOriginalExtension();
            else
                $filename = $tour->slug . '.' . $image->encode('png');
            $location = public_path("img/". $filename);
            Image::make($image)->resize(400,250)->save($location);
        }
        $tour->save();
        //set flash data with success message
        Session::flash('success', 'This tour was successfully saved.');

        return redirect()->route('tour.show', $tour->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::find($id);
        $tour->delete();

        Session::flash('success', 'The tour was successfully deleted.');
        return redirect()->route('tour.index');
    }
}
