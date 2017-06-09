<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regions;
use App\Tour;
use App\Cart;
use App\Order;
use App\Location;
use Auth;
use Session;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function Cart()
	{
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return $cart;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$location = Location::all();
		$regions = Regions::all();
		$cart = $this->Cart();
		return view('welcome')->withRegions($regions)->withLocation($location)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function tour()
	{
		$tours = Tour::orderBy('updated_at', 'desc')->paginate(9);
		$location = Location::all();
		$cart = $this->Cart();
		return view('tour')->withTours($tours)->withLocation($location)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function searchTour(Request $request)
	{
		$noidi = $request->noidi;
		$noiden = $request->noiden;		
		if($noidi != null && $noiden !=null)
		{
			$depart_location = Location::where('slug', '=', $noidi)->first();
			$dest_location = Location::where('slug', '=', $noiden)->first();
			$tours = Tour::where('depart_location_id',$depart_location->id)->where('dest_location_id',$dest_location->id)->orderBy('updated_at', 'desc')->paginate(9);
			$cart = $this->Cart();
			$location = Location::all();
			return view('tour')->withTours($tours)->withLocation($location)->withCarts($cart->items)->withPrice($cart->totalPrice);
		}
		else if($noidi == null && $noiden != null)
		{
			return $this->tourInLocation('noiden',$noiden);
		}
		else if($noidi != null && $noiden == null)
		{
			return $this->tourInLocation('noidi',$noidi);
		}
		else
		{
			return $this->tour();
		}
	}

	public function tourInLocation($name, $slug)
	{
		switch($name)
		{
			case 'noidi':
				$location = Location::where('slug', '=', $slug)->first();
				$tours = Tour::where('depart_location_id',$location->id)->orderBy('updated_at', 'desc')->paginate(9);
				break;
			case 'noiden':
				$location = Location::where('slug', '=', $slug)->first();
				$tours = Tour::where('dest_location_id',$location->id)->orderBy('updated_at', 'desc')->paginate(9);
				break;
			case 'vung':
				$region = Regions::where('slug',$slug)->first();
				$locations = Location::where('region_id',$region->id)->get();
				$where = array();
				foreach ($locations as $k=> $location) {
					$where[$k] = $location->id;
				}
				$tours = Tour::whereIn('dest_location_id',$where)->orderBy('updated_at', 'desc')->paginate(9);
				break;
			case 'loaihinh':
				switch($slug)
				{
					case "trong-nuoc":
						$tours = Tour::where('type','0')->orderBy('updated_at', 'desc')->paginate(9);
						break;
					case "nuoc-ngoai":
						$tours = Tour::where('type','1')->orderBy('updated_at', 'desc')->paginate(9);
						break;
				}
				break;
		}
		$cart = $this->Cart();
		$location = Location::all();
		return view('tour')->withTours($tours)->withLocation($location)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function getSingle($slug)
  	{
		$tour = Tour::where('slug', '=', $slug)->first();
		$cart = $this->Cart();
		return view('detail')->withTour($tour)->withCarts($cart->items)->withPrice($cart->totalPrice);
  	}

	public function addShoppingCart(Request $request, $id)
	{
		$tour = Tour::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($tour, $tour->id);

		$request->session()->put('cart', $cart);

		return redirect()->back();
	}

	public function getCheckout()
	{
		if(!Session::has('cart')) {
			return redirect()->back();
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('checkout')->withTotal($total)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function postCheckout(Request $request)
	{
		if(!Session::has('cart')) {
			return redirect()->back();
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);

		try {
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->phone = $request->input('phone');
			$order->status = 'Chưa xử lý';

			Auth::user()->orders()->save($order);
		} catch(\Exception $e) {
			return redirect()->route('checkout')->with('error', $e->getMessage());
		}

		Session::forget('cart');
		return redirect()->route('home')->with('success', 'Successfully purchased products!');
	}

    public function getUpdate(Request $request)
    {
		if($request->ajax())
		{
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			$cart = new Cart($oldCart);
			foreach($request->cartModel as $item)
			{
				$id = $item['Tour'];
				$qty = $item['Quatity'];
				$cart->update($id,$qty);
			}

			Session::put('cart', $cart);
			return response()->json(true);
		}
    }

    public function getRemoveItem(Request $request)
    {
		if($request->ajax())
		{
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			$cart = new Cart($oldCart);
			$cart->removeItem($request->id);

			if(count($cart->items) > 0) {
				Session::put('cart', $cart);
			} else {
				Session::forget('cart');
			}
			return response()->json(true);
		}
	}

	public function getRemoveAll()
    {
        Session::forget('cart');
        return response()->json(true);
    }

	public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
		$cart = $this->Cart();
        return view('profile')->withOrders($orders)->withCarts($cart->items)->withPrice($cart->totalPrice);
    }
}
