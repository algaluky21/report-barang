<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plc extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_plc', 'var_plc', 'address','type','location'
    ];
}
