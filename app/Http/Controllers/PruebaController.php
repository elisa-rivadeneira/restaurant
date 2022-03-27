<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PruebaController extends Controller
{
    public function prueba()
    {
        $idconfigultimo = DB::table('configs')->latest('id')->first()->id;
        $menuslastconfig = Config::find($idconfigultimo)->menus;

        dd($menuslastconfig);
    }
}
