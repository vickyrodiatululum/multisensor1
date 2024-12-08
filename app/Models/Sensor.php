<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'tb_sensor';
    protected $fillable = [
        'train1',
        'train2',
        'train3',
        'train4',
    ];
}
