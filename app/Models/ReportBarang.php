<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id', 'nama_pengambil', 'keperluan', 'jumlah'
    ];

    
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
