<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ConfigMenu extends Pivot
{
    use HasFactory;

    protected $fillable = ['config_id', 'menu_id', 'porciones', 'porcionesini'];

}
