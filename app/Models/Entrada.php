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

    public function config(){
        return $this->belongsTo(Orden::class, 'config_entrada');
    }

}
