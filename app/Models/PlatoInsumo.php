<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PlatoInsumo extends Model
{
    use HasFactory;

    protected $fillable = ['plato_id', 'insumo_id', 'cantidad'];
}
