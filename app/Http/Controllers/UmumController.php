<?php

namespace App\Http\Controllers;
use App\Models\Plc;

use Illuminate\Http\Request;

class UmumController extends Controller
{
    public function index()
    {
        $plcs = Plc::latest()->paginate(20);

        return view('umum.index',[
            'return' =>'Plcv',
            'active' => 'plc'],compact('plcs'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
}
