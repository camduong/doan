<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regions;
use Session;

class RegionsController extends Controller
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
         $regions = Regions::all();
        return view('region.index')->withRegions($regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = new Regions;
        $region->name = $request->name;
        $region->slug = $request->slug;
        $region->introduce = $request->introduce;
        $region->save();

        Session::flash('success', 'The new region was sucessfully save!');
        return redirect()->route('region.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Regions::find($id);
        return view('region.edit')->withRegion($region);
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
        $region = Regions::find($id);
        $region->name = $request->input('name');
        $region->slug = $request->input('slug');
        $region->introduce = $request->input('introduce');
        $region->save();

        Session::flash('success', 'The region was sucessfully edit!');
        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Regions::find($id);
        $region->delete();
        Session::flash('success', 'The region was successfully deleted.');
        return redirect()->route('region.index');
    }
}
