<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama_barang', 'jenis_barang', 'stok'
    // ];


    public function report(): HasMany
    {
        return $this->hasMany(ReportBarang::class,'barang_id');
    }
}
