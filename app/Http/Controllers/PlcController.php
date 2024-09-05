<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plc;
use Yajra\DataTables\DataTables; 


class PlcController extends Controller
{
    public function index()
    {
        $plcs = Plc::latest()->paginate(20);

        return view('plc.index',[
            'return' =>'Plc',
            'tittle' => 'Data PLC',
            'active' => 'plc'
            ],compact('plcs'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    
    public function getPlcData()
    {
        $plc = Plc::select(['id', 'nama_plc', 'var_plc', 'address', 'type', 'location', 'created_at', 'updated_at']);
        return DataTables::of($plc)
            ->addColumn('action', function($row) {
                return '<button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button> 
                        <button class="delete btn btn-danger btn-sm" data-id="'.$row->id.'">Delete</button>';
            })
            ->editColumn('created_at', function($row) {
                return $row->created_at->format('Y-m-d'); // Format tanggal
            })
            ->editColumn('updated_at', function($row) {
                return $row->updated_at->format('Y-m-d'); // Format tanggal
            })
            ->rawColumns(['action'])
            ->make(true);
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

    public function show($id)
    {
        $plc= Plc::find($id);
    
        if ($plc) {
            return response()->json($plc);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
    

    public function edit(Plc $plc)
    {
        return view('plc.edit',compact('plc'));
    }

    // public function update(Request $request, Plc $plc)
    // {
    //     $request->validate([
    //         'nama_plc' => 'required',
    //         'var_plc' => 'required',
    //         'address' => 'required',
    //         'type' => 'required',
    //         'location' => 'required',
    //     ]);

    //     $plc->update($request->all());

    //     return redirect()->route('plcs.index')
    //                     ->with('success','Post updated successfully');
    // }

    // public function destroy(Plc $plc)
    // {
    //     $plc->delete();

    //     return redirect()->route('plcs.index')
    //                     ->with('success','Post deleted successfully');
    // }


    public function update(Request $request, $id)
    {
        $plc = Plc::find($id);
    
        if ($plc) {
            $plc->update([
                'nama_plc' => $request->nama_plc,
                'var_plc' => $request->var_plc,
                'address' => $request->address,
                'type' => $request->type,
                'location' => $request->location,
            ]);
            return response()->json(['success' => 'Data updated successfully']);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

 

    public function destroy($id)
    {
        $plc = Plc::find($id);
        if ($plc) {
            $plc->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

}
