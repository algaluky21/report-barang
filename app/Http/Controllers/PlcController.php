<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plc;

class PlcController extends Controller
{
    public function index()
    {
        $plcs = Plc::latest()->paginate(20);

        return view('plc.index',[
            'return' =>'Plc',
            'active' => 'plc'
            ],compact('plcs'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    


    public function create()
    {
        return view('plc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_plc' => 'required',
            'var_plc' => 'required',
            'address' => 'required',
            'type' => 'required',
            'location' => 'required',
        ]);

        Plc::create($request->all());

        return redirect()->route('plcs.index')
                        ->with('success','Post created successfully.');
    }

    public function show(Plc $plc)
    {
        return view('plc.show',compact('plc'));
    }

    public function edit(Plc $plc)
    {
        return view('plc.edit',compact('plc'));
    }

    public function update(Request $request, Plc $plc)
    {
        $request->validate([
            'nama_plc' => 'required',
            'var_plc' => 'required',
            'address' => 'required',
            'type' => 'required',
            'location' => 'required',
        ]);

        $plc->update($request->all());

        return redirect()->route('plcs.index')
                        ->with('success','Post updated successfully');
    }

    public function destroy(Plc $plc)
    {
        $plc->delete();

        return redirect()->route('plcs.index')
                        ->with('success','Post deleted successfully');
    }

}
