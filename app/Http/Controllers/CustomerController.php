<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Memberships;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customers::orderBy('id','desc')->paginate(5);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $memberships = Memberships::orderBy('id','asc')->get();

        return view('customers.create', compact('memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'id_membership' => 'required',
        ]);
        
        Customers::create($request->post());

        return redirect()->route('customers.index')->with('success','Customers has been created successfully.');
    }

    public function show(Customers $customers)
    {
        return view('customers.show',compact('customers'));
    }

    public function edit($id)
    {
        $customers = Customers::find($id);
        if (!$customers) {
            $customers = [];
        }
        $memberships = Memberships::orderBy('id','asc')->get();
        return view('customers.edit',compact(['customers', 'memberships']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'id_membership' => 'required',
        ]);

        $customers = Customers::find($id);
        if (!$customers) {
            
        } else {
            $customers->update($request->post());
        }

        return redirect()->route('customers.index')->with('success','Customers Has Been updated successfully');
    }

    public function destroy($id)
    {
        $customers = Customers::find($id);
        if (!$customers) {
            
        } else {
            $customers->delete();
        }
        
        return redirect()->route('customers.index')->with('success','Customers has been deleted successfully');
    }
}
