<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memberships;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Memberships::orderBy('id','desc')->paginate(5);
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('memberships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_membership' => 'required',
            'diskon' => 'required',
            'min_profit' => 'required',
        ]);
        
        Memberships::create($request->post());

        return redirect()->route('memberships.index')->with('success','Memberships has been created successfully.');
    }

    public function show(Memberships $memberships)
    {
        return view('memberships.show',compact('memberships'));
    }

    public function edit($id)
    {
        $memberships = Memberships::find($id);
        if (!$memberships) {
            $memberships = [];
        }

        return view('memberships.edit',compact('memberships'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_membership' => 'required',
            'diskon' => 'required',
            'min_profit' => 'required',
        ]);

        $memberships = Memberships::find($id);
        if (!$memberships) {
            
        } else {
            $memberships->update($request->post());
        }

        return redirect()->route('memberships.index')->with('success','Memberships Has Been updated successfully');
    }

    public function destroy($id)
    {
        $memberships = Memberships::find($id);
        if (!$memberships) {
            
        } else {
            $memberships->delete();
        }
        
        return redirect()->route('memberships.index')->with('success','Memberships has been deleted successfully');
    }
}