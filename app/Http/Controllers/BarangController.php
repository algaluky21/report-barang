<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $barang = Barang::latest()->paginate(5);

        $active = 'barang';
            return view('posts.index',[
            'return' => 'Post',
            'active' => 'post',
            'tittle' => 'Stok Barang'
            ],compact('barang', 'active'))->with('i', (request()->input('page', 1) - 1) * 5);

        

    }

    public function getBarangsData()
    {
        $barangs = Barang::select(['id', 'nama_barang', 'jenis_barang', 'stok', 'created_at', 'updated_at']);
        return DataTables::of($barangs)
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'login';
        return view('posts.create', compact('active'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
    
        if ($barang) {
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'jenis_barang' => $request->jenis_barang,
                'stok' => $request->stok,
            ]);
            return response()->json(['success' => 'Data updated successfully']);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $barang = Barang::find($id);
    
        if ($barang) {
            return response()->json($barang);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
        return view('posts.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Barang $barang)
    // {
    //     $request->validate([
    //         'nama_barang' => 'required',
    //         'jenis_barang' => 'required',
    //         'stok' => 'required',
            
    //     ]);

    //     $barang->update($request->all());

    //     return redirect()->route('barang.index')
    //                     ->with('success','Post updated successfully');
    // }



    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Barang $barang)
    // {
    //     $barang->delete();

    //     return redirect()->route('barang.index')
    //                     ->with('success','Post deleted successfully');
    // }
}
