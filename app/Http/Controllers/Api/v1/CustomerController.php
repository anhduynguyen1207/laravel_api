<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\v1\CustomerResource;
class CustomerController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Customer::all();
        return CustomerResource::collection(Customer::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Customer $customer, Request $request)
    {
        $this->validate($request,[
            'name_customer'=> 'required',
            'email_customer'=>'required',
            'phone_customer'=>'required',
            'address_customer'=>'required',
            'city_customer'=>'required'          
        ]);
        $customer = Customer::create($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Customer $customer, Request $request)
    {
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer)
    {
        $delCust = Customer::find($customer);
        $delCust->delete();
    }
}
