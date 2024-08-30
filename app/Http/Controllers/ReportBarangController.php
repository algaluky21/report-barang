<?php

namespace App\Http\Controllers;

use App\Models\ReportBarang;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

      
        return view('report.index',[
        'return' =>'Post',
        'active' => 'post'
        ],compact('report_barangs'))->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('report/index',compact('report_barangs'));

        // return view('report.index',[
        // 'return' =>'Post',
        // 'active' => 'post'
        // ],compact('report_barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
