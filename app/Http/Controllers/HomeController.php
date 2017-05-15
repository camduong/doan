<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Images;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('welcome');
    }

    public function tour()
    {
        $tours = Tour::all();
        foreach ($tours as $k => $tour) {
            $image = Images::select('img_name')->where('tour_id',$tour->id)->first();
            $tours[$k]['image'] = $image -> img_name;
        }
        return view('tour')->withTours($tours);
    }

    public function getSingle($slug)
    {
        $tour = Tour::where('slug', '=', $slug)->first();
        $header = explode("</p>",$tour->header_schedule);
        // print_r($header);
        // die;
        return view('detail')->withTour($tour)->withHeader($header);
    }
}
