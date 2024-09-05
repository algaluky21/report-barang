<?php

namespace App\Http\Controllers;

use App\Models\ReportBarang;
use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ReportBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
       
        $report_barangs = ReportBarang::latest()->paginate(5);
        $barangs = Barang::all();
        
=======

        $report_barangs = ReportBarang::latest()->paginate(5);
        $barangs = Barang::get();

>>>>>>> 63f5ac4bef736d59166393f9076eb0e0cc5ee1a1
        return view('report.index',[
        'tittle' => 'Laporan Barang',
        'return' =>'Post',
        'active' => 'post'
<<<<<<< HEAD
        ],compact('report_barangs','barangs'))->with('i', (request()->input('page', 1) - 1) * 5);
=======
        ],compact('report_barangs', 'barangs'))->with('i', (request()->input('page', 1) - 1) * 5);

>>>>>>> 63f5ac4bef736d59166393f9076eb0e0cc5ee1a1

    }

    public function getData()
    {
        $reportBarangs = ReportBarang::with('barang')->select('report_barangs.*');

        return datatables()->of($reportBarangs)
            ->addColumn('barang_nama', function ($row) {
                return $row->barang->nama_barang;
            })
            ->addColumn('barang_jenis', function ($row) {
                return $row->barang->jenis_barang;
            })
            ->addColumn('action', function ($row) {
                $btn = '<button data-id="'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $btn .= ' <button data-id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $btn;
            })
            ->editColumn('created_at', function($row) {
                return $row->created_at->format('Y-m-d'); // Format tanggal
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_pengambil' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $reportBarang = ReportBarang::find($id);
        if ($reportBarang) {
            $reportBarang->update($request->all());
            return response()->json(['success' => 'Data updated successfully']);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function destroy($id)
    {
        $reportBarang = ReportBarang::find($id);
        if ($reportBarang) {
            $reportBarang->delete();
            return response()->json(['success' => 'Data deleted successfully']);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        
=======
>>>>>>> 63f5ac4bef736d59166393f9076eb0e0cc5ee1a1

       return view('report.index', compact('barangs'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'barang_id' => 'required',
        //     'nama_pengambil' => 'required',
        //     'keperluan' => 'required',
        //     'jumlah' => 'required',
        // ]);

        // ReportBarang::create($request->all());

        // return redirect()->route('reports.index')
        //                 ->with('success','Post created successfully.');

        // Validasi input
        $request->validate([
<<<<<<< HEAD
            'barang_id' => 'required|exists:barangs,id',
            'nama_pengambil' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Ambil data barang terkait
        $barang = Barang::findOrFail($request->barang_id);
=======
            'barang_id'      => 'required',
            'nama_pengambil' => 'required',
            'keperluan'      => 'required',
            'jumlah'         => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $barang = Barang::find($request?->barang_id);
                if($barang && (int)$barang?->stok - (int)$request?->jumlah >= 0){
                    $barang?->update([
                        'stok' => $barang?->stok - (int)$request?->jumlah
                    ]);

                    $barang?->reportBarangs()->create([
                        'nama_pengambil' => $request?->nama_pengambil,
                        'keperluan'      => $request?->keperluan,
                        'jumlah'         => $request?->jumlah,
                    ]);
                }
            });
        } catch (Exception | Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
        }
>>>>>>> 63f5ac4bef736d59166393f9076eb0e0cc5ee1a1

        // Kurangi stok barang
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }
        
        $barang->stok -= $request->jumlah;
        $barang->save();

        // Simpan data ke report_barangs
        ReportBarang::create([
            'barang_id' => $request->barang_id,
            'nama_pengambil' => $request->nama_pengambil,
            'keperluan' => $request->keperluan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('reports.index')->with('success', 'Data berhasil disimpan dan stok telah diperbarui.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reportBarang = ReportBarang::with('barang')->find($id);
        if ($reportBarang) {
            return response()->json($reportBarang);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportBarang $reportBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, ReportBarang $reportBarang)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */
    // public function destroy(ReportBarang $reportBarang)
    // {
    //     //
    // }
}
