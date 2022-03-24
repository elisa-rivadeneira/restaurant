<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrdenEntrada extends Pivot
{
    use HasFactory;

    protected $fillable = ['orden_id', 'entrada_id', 'cantidad', 'estado','t_preparacion', 't_servido','t_cobrado' ];

}
