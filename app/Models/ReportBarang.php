<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ReportBarang extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'barang_id','nama_pengambil', 'keperluan', 'jumlah'
    // ];

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
   
}
