<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'preciomenu',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'config_menu')->withPivot('porciones');
    }
    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'config_entrada')->withPivot('porciones');
    }
}
