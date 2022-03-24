<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'precio',
        'costo',
        'porciones'
      ];

      public function insumos(){
        return $this->belongsToMany('App\Models\Insumo');
    }

    public function ordens(){
        return $this->belongsToMany(Orden::class, 'orden_plato');
    }
}
