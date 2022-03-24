<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $fillable = [
        'mesa',
        'total',
        'status',
        'tiempo_despacho',
        'tiempo_cobro',

    ];

    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'orden_plato')->withPivot('cantidad');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'orden_menu')->withPivot('cantidad', 'entrada_id');
    }

}
