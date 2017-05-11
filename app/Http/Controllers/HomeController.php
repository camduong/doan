<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

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
        $tours = Tour::orderBy('updated_at', 'desc')->paginate(2);
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
