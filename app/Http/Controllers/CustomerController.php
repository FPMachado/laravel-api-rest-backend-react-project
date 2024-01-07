<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        return response()->json($customer);
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }


    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        return response()->json($customer);
    }

    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json($customer);
    }
}
