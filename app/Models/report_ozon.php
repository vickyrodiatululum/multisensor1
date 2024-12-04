<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class report_ozon extends Model
{
    protected $fillable = [
        'train',
        'pompa_pre_ozon',
        'pompa_transfer',
        'step',
        'kadar_ozon_static',
        'kadar_ozon_ft',
        'kadar_ozon_analyzer',
        'airflow',
        'cooling_water',
        'set_level_ft_middle',
        'set_level_ft_high',
        'lampu_uv',
        'voltase',
        'ampere',
    ];
}
