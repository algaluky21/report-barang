<?php

namespace App\Http\Controllers;
use App\Models\Plc;
use Yajra\DataTables\DataTables; 
use Illuminate\Http\Request;

class UmumController extends Controller
{
    public function index()
    {
        $plcs = Plc::latest()->paginate(20);

        return view('umum.index',[
            'return' =>'Plcv',
            'tittle' => 'Address PLC',
            'active' => 'plc'],compact('plcs'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function getPlcData()
    {
        $plc = Plc::select(['id', 'nama_plc', 'var_plc', 'address', 'type', 'location', 'created_at', 'updated_at']);
        return DataTables::of($plc)
          
            ->editColumn('created_at', function($row) {
                return $row->created_at->format('Y-m-d'); // Format tanggal
            })
            ->editColumn('updated_at', function($row) {
                return $row->updated_at->format('Y-m-d'); // Format tanggal
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    


}

