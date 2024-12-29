<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'status' => 'required',
            'account_type' => 'required',
        ]);

        Customer::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'account_type' => $request->account_type,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:customers,email,' . $id,
            'status' => 'required',
            'account_type' => 'required',
        ]);

        $customer->update([
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $customer->password,
            'status' => $request->status,
            'account_type' => $request->account_type,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
    
}
