<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampuUV extends Model
{
    protected $fillable = [
        'jenis_lampu',
        'tanggal',
        'usia_lampu'
    ];
}
