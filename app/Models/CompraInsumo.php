<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompraInsumo extends Pivot
{
    use HasFactory;

    protected $fillable = ['compra_id', 'insumo_id', 'cantidad', 'costo'];

}
