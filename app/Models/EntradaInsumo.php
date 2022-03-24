<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaInsumo extends Model
{
    use HasFactory;
    protected $fillable = ['entrada_id', 'insumo_id', 'cantidad'];

}
