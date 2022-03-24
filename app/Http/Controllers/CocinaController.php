<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenMenu;
use App\Models\Orden;
use App\Models\Menu;
use App\Models\Entrada;
use App\Models\OrdenEntrada;
use Carbon\Carbon;

class CocinaController extends Controller{

    public function index()
        {
            $ordens= Orden::all();
            //$entradas=OrdenEntrada::all();
            $hoy= Carbon::now();

            $menus = Menu::select("menus.*", "orden_menu.cantidad as cantidad", "orden_menu.estado as estado", "orden_menu.t_preparacion as t_preparacion","orden_menu.id as idordenmenu", "orden_menu.created_at as tiempo_solicitud", "ordens.mesa")
                ->join("orden_menu", "menus.id", "=", "orden_menu.menu_id")
                ->join("ordens", "orden_menu.orden_id", "=", "ordens.id")
                ->orderBy('orden_menu.estado', 'ASC')
                ->orderBy('orden_menu.created_at', 'ASC')
                ->get();

            $entradas = Entrada::select("entradas.*", "orden_entrada.cantidad as cantidad", "orden_entrada.estado as estado", "orden_entrada.t_preparacion as t_preparacion","orden_entrada.id as idordenentrada", "orden_entrada.created_at as tiempo_solicitud", "ordens.mesa")
                ->join("orden_entrada", "entradas.id", "=", "orden_entrada.entrada_id")
                ->join("ordens", "orden_entrada.orden_id", "=", "ordens.id")
                ->orderBy('orden_entrada.estado', 'ASC')
                ->orderBy('orden_entrada.created_at', 'ASC')
                ->get();
            return view('cocina.index', compact('menus', 'entradas', 'ordens', 'hoy'));
        }

    public function status0($id)
    {
        $orden = OrdenMenu::find($id);
        $orden->estado = '0';
        $orden->save();
        return redirect('/cocina');

    }

    public function status1($id)
    {
        $orden = OrdenMenu::find($id);
        $orden->estado = '1';
        $orden->t_preparacion = Carbon::now();
        $orden->save();
        return redirect('/cocina');
    }

    public function statuse0($id)
    {
        $orden = OrdenEntrada::find($id);
        $orden->estado = '0';
        $orden->save();
        return redirect('/cocina');

    }

    public function statuse1($id)
    {
        $orden = OrdenEntrada::find($id);
        $orden->estado = '1';
        $orden->t_preparacion = Carbon::now();
        $orden->save();
        return redirect('/cocina');
    }
}
