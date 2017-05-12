<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Tour;
use App\Images;
use App\Hotel;
use App\Location;
use App\Vehicle;
use Session;
use Image;

class TourController extends Controller
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
    public function store(Request $request, UploadRequest $uprequest)
    {
        // $this->validate($request, array(
        //     'name' => 'required|max:255',
        //     'slug'  => 'required|alpha_dash|min:5|max:255|unique:tours,slug',
        //     'travel_id' => 'required|integer',
        //     'price' => 'required|integer',
        //     'day' => 'required|integer',
        //     'header' => 'required',
        //     'detail' => 'required',
        // ));
        //store in the database
        $tour = new Tour;

        $tour->name = $request->name;
        $tour->slug = $request->slug;
        $tour->number = $request->number;
        $tour->hotel_id = $request->hotel_id;
        $tour->location_id = $request->location_id;
        $tour->vehicle_id = $request->vehicle_id;
        $tour->depart_date = date('Y/d/m',strtotime($request->depart_date));
        $tour->back_date = date('Y/d/m',strtotime($request->back_date));
        $tour->day = $request->day;
        $tour->price = $request->price;
        $tour->schedule = $request->detail;
        $tour->save();
        if($request->featured_images)
        {
            foreach ($uprequest->featured_image as $image2) {
                $filename = $tour->id . '_' . rand(1,100) . '_' . time() . '.' . $image2->getClientOriginalExtension();
                $location = public_path('img/'. $filename);
                Image::make($image2)->resize(800, 400)->save($location);

                $image = new Images;
                $image->tour_id = $tour->id;
                $image->img_name = $filename;
            // $myimage[] = $filename;
                $image->save();
            }
        }

        //print_r($myimage);
        //die;
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
        // $tt = explode("<p>",$tour->header_schedule);
        // print_r(json_encode($tt));
        // die;
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
        $tour = Tour::find($id);
        if($request->input('slug') == $tour->slug) {
            $this->validate($request, array(
                'name' => 'required|max:255',
                'price' => 'required|integer',
                'day' => 'required|integer',
                'detail' => 'required',
            ));
        } else {
            $this->validate($request, array(
                'name' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:tours,slug',
                'price' => 'required|integer',
                'day' => 'required|integer',
                'detail' => 'required',
            ));
        }
        //save the data to the database
        $tour = Tour::find($id);

        $tour->name = $request->input('name');
        $tour->slug = $request->input('slug');
        $tour->number = $request->input('number');
        $tour->hotel_id = $request->input('hotel_id');
        $tour->location_id = $request->input('location_id');
        $tour->vehicle_id = $request->input('vehicle_id');
        $tour->depart_date = $request->input('depart_date');
        $tour->back_date = $request->input('back_date');
        $tour->day = $request->input('day');
        $tour->price = $request->input('price');
        $tour->schedule = $request->input('detail');
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
