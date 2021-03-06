<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Order::all();
        return view('customer.index')->withCustomers($customers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Order::find($id);
        $customers->cart = unserialize($customers->cart);
        return view('customer.show', ['customers' => $customers]);
    }

    public function edit($id)
    {
        $customers = Order::find($id);
        $customers->cart = unserialize($customers->cart);
        return view('customer.edit', ['customer' => $customers]);
    }

    public function update(Request $request, $id)
    {
        //save the data to the database
        $customers = Order::find($id);

        $customers->status = $request->input("status");
        $customers->save();
        //set flash data with success message

        return redirect()->route('customer.show', $customers->id);
    }
}
