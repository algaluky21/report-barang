<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportBarang extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Report::class, 'barang_id', 'id');
    }
}
