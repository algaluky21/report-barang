<?php

namespace App\Http\Controllers;

use App\Models\ReportBarang;
use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;

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

        $report_barangs = ReportBarang::latest()->paginate(5);
        $barangs = Barang::get();

        return view('report.index',[
        'return' =>'Post',
        'active' => 'post'
        ],compact('report_barangs', 'barangs'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $request->validate([
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

        return redirect()->route('report.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */
    public function show(ReportBarang $reportBarang)
    {
        //
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
    public function update(Request $request, ReportBarang $reportBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportBarang  $reportBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportBarang $reportBarang)
    {
        //
    }
}
