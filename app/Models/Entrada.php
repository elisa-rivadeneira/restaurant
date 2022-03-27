<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'costo',
        'status',
        'porciones'
    ];

    public function insumos(){
        return $this->belongsToMany('App\Models\Insumo');
    }

    public function ordens(){
        return $this->belongsToMany(Orden::class, 'orden_entrada');
    }
    public function config(){
        return $this->belongsTo(Orden::class, 'config_entrada');
    }

}
