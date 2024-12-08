<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train3 extends Model
{
        protected $fillable = [
        'slot',
        'jenis_lampu',
        'pergantian',
        'usia'
    ];
}
