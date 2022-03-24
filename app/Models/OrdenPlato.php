<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrdenPlato extends Pivot
{
    use HasFactory;

    protected $fillable = ['orden_id', 'plato_id', 'cantidad'];

}
