<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact(['customers']));
    }

    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);
        Customer::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'address'=> $request->address,
            'phone'=> $request->phone,
        ]);

        return redirect('/customers')->with('success', 'Data Customer berhasil ditambahkan');
    }
}
