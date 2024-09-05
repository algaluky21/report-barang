<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_barang', 'jenis_barang', 'stok'
    ];

    public $timestamps = true;

    public function reportBarangs()
    {
        return $this->hasMany(ReportBarang::class, 'barang_id', 'id');
    }
}
