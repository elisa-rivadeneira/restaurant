<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'costo',
        'unidad',
      ];

    public function platos(){
        return $this->belongsToMany('App\Models\Plato');
    }

    public function compras(){
        return $this->belongsToMany('App\Models\Compra');
    }

}

