<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valas;

class ValasController extends Controller
{
    public function index()
    {
        $valas = Valas::orderBy('id','desc')->paginate(5);
        return view('valas.index', compact('valas'));
    }

    public function create()
    {
        return view('valas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_valas' => 'required',
            'nilai_jual' => 'required',
            'nilai_beli' => 'required',
            'tanggal_rate' => 'required',
        ]);
        
        Valas::create($request->post());

        return redirect()->route('valas.index')->with('success','Valas has been created successfully.');
    }

    public function show(Valas $valas)
    {
        return view('valas.show',compact('valas'));
    }

    public function edit($id)
    {
        $valas = Valas::find($id);
        if (!$valas) {
            $valas = [];
        }
        return view('valas.edit',compact('valas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_valas' => 'required',
            'nilai_jual' => 'required',
            'nilai_beli' => 'required',
            'tanggal_rate' => 'required',
        ]);

        $valas = Valas::find($id);
        if (!$valas) {
            
        } else {
            $valas->update($request->post());
        }

        return redirect()->route('valas.index')->with('success','Valas Has Been updated successfully');
    }

    public function destroy($id)
    {
        $valas = Valas::find($id);
        if (!$valas) {
            
        } else {
            $valas->delete();
        }
        
        return redirect()->route('valas.index')->with('success','Valas has been deleted successfully');
    }
}
