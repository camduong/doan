<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Images;
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
		$cart = $this->Cart();
		return view('welcome')->withLocation($location)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function tour()
	{
		$tours = Tour::orderBy('updated_at', 'desc')->paginate(2);
		foreach ($tours as $k => $tour) {
			$image = Images::select('img_name')->where('tour_id',$tour->id)->first();
			$tours[$k]['image'] = $image -> img_name;
		}
		$cart = $this->Cart();
		return view('tour')->withTours($tours)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function tourInLocation($slug)
	{
		$location = Location::where('slug', '=', $slug)->first();
		$tours = Tour::where('location_id',$location->id)->orderBy('updated_at', 'desc')->paginate(2);
		foreach ($tours as $k => $tour) {
			$image = Images::select('img_name')->where('tour_id',$tour->id)->first();
			$tours[$k]['image'] = $image -> img_name;
		}
		$cart = $this->Cart();
		return view('tour')->withTours($tours)->withCarts($cart->items)->withPrice($cart->totalPrice);
	}

	public function getSingle($slug)
  {
		$tour = Tour::where('slug', '=', $slug)->first();
		$images = Images::select('img_name')->where('tour_id',$tour->id)->get();
		foreach ($images as $k => $image) {
			$tour['image'][$k] = $image -> img_name;
		}
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

	public function getCart()
	{
		if(!Session::has('cart')) {
			return view('shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('shopping-cart', ['tours' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	}

		public function getCheckout()
		{
			if(!Session::has('cart')) {
				return view('shop.shopping-cart');
			}
			$oldCart = Session::get('cart');
			$cart = new Cart($oldCart);
			$total = $cart->totalPrice;
			return view('checkout', ['total' => $total]);
		}

		public function postCheckout(Request $request)
		{
			if(!Session::has('cart')) {
				return redirect()->route('shoppingCart');
			}
			$oldCart = Session::get('cart');
			$cart = new Cart($oldCart);

			try {
				$order = new Order();
				$order->cart = serialize($cart);
				$order->address = $request->input('address');
				$order->name = $request->input('name');

				Auth::user()->orders()->save($order);
			} catch(\Exception $e) {
				return redirect()->route('checkout')->with('error', $e->getMessage());
			}

			Session::forget('cart');
			return redirect()->route('home')->with('success', 'Successfully purchased products!');
		}

		public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

     public function getAddByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);

        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
}
