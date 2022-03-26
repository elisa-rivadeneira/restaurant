<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Plato;
use App\Models\Menu;
use App\Models\Entrada;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentaController extends Controller
{
    public function ventas()
    {
        $hoy= Carbon::now();
        $items = Orden::where('status', '2')->get();
        return view('venta.index')->with('items', $items)->with('hoy', $hoy);

    }

    public function reporte()
    {
        $ventas = Orden::where('status', '2')->get();
        return view('venta.reporte')->with('items', $ventas);

    }

    public function anual()
    {
        $ventas = Orden::where('status', '2')->get();
        return view('venta.anual')->with('items', $ventas);

    }

    public function semanal()
    {
        $ventas = Orden::where('status', '2')->get();
        return view('venta.semanal')->with('items', $ventas);

    }

    public function diario()
    {
        $diaconfig = DB::table('configs')->latest('id')->first()->dia;

        $totalventashoy = Orden::where('status', '2')->whereDate('created_at', '=', $diaconfig)
            ->get();
        $nroventas = count($totalventashoy);
        $ventadia = $totalventashoy = Orden::where('status', '2')->whereDate('created_at', '=', $diaconfig)
            ->sum('total');

        $idordens = Orden::where('status', '2')->whereDate('created_at', '=',  $diaconfig)->pluck('id');


        $datos = array(); // defined the $data here out of loop

        foreach ($idordens as $idorden) {

            $menus = Orden::find($idorden)->menus;

            foreach ($menus as $menu) {
                $menuid = $menu->pivot->menu_id;
                $cantidad = $menu->pivot->cantidad;
                $plato = Menu::find($menuid);

                $datos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                ];


            }


        }















        return view('venta.diario')->with('items', $totalventashoy)->with('nroventas', $nroventas)->with('ventadia', $ventadia)->with('datos', $datos)->with('diaconfig', $diaconfig);;


    }







    public function mensual()
    {
        $totalventashoy = Orden::where('status', '2')->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->get();
        $nroventas = count($totalventashoy);
        $ventadia = $totalventashoy = Orden::where('status', '2')->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->sum('total');

        $idordens = Orden::where('status', '2')->whereDate('created_at', '=', Carbon::now())->pluck('id');
        $datos = array(); // defined the $data here out of loop

        foreach ($idordens as $idorden) {

            $platos = Orden::find($idorden)->platos;

            foreach ($platos as $plato) {
                $platoid = $plato->pivot->plato_id;
                $cantidad = $plato->pivot->cantidad;
                $plato = Plato::find($platoid);

                $datos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                ];


            }


        }















        return view('venta.mensual')->with('items', $totalventashoy)->with('nroventas', $nroventas)->with('ventadia', $ventadia)->with('datos', $datos);


    }








    public function dia($dia)
    {

        $day = $dia;
        $totalventasdia = Orden::where('status', '2')->whereDate('created_at', '=', $day)->get();


        $nroventas = count($totalventasdia);
        $ventadia = Orden::where('status', '2')->whereDate('created_at', '=', $day)->sum('total');


        $reporte = array();
        $reporte [] = [
            'nroventas' => $nroventas,
            'ventassoles' => $ventadia,
        ];


        return response()->json([
            'data' => $reporte,
        ]);


    }


    public function ventasmes($mes)
    {

        $year = substr($mes, 0, 4);
       $month = substr($mes, -2);




   //     dd($year);

        $totalventasmes = Orden::where('status', '2')->whereMonth('created_at', '=', $month)->get();

        $nroventas = count($totalventasmes);
        $ventames = Orden::where('status', '2')->whereMonth('created_at', '=', $month)->sum('total');


        $reporte = array();
        $reporte [] = [
            'nroventas' => $nroventas,
            'ventassoles' => $ventames,
        ];


        return response()->json([
            'data' => $reporte,
        ]);


    }


    public function ventasplatos($dia)
    {

        $day = $dia;
        $idordens = Orden::where('status', '2')->whereDate('created_at', '=', $day)->pluck('id');

        $dataplatos = array(); // defined the $data here out of loop
        foreach ($idordens as $key => $idorden) {

            $platos = Orden::find($idorden)->platos;

            if (count($platos) > 0) {
                foreach ($platos as $plato) {
                    $platoid = $plato->pivot->plato_id;
                    $cantidad = $plato->pivot->cantidad;
                    $orden = $plato->pivot->orden_id;
                    $plato = Plato::find($platoid);
                }
                $dataplatos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                    'orden' => $idorden
                ];
            }
        }



        $result = array();
        foreach ($dataplatos as $t) {
            $repeat = false;
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i]['nombre'] == $t['plato']) {
                    $result[$i]['cantidad'] += $t['cantidad'];
                    $repeat = true;
                    break;
                }
            }
            if ($repeat == false)
                $result[] = array('nombre' => $t['plato'], 'cantidad' => $t['cantidad']);
        }





















        return response()->json([
            'data' => $result,
        ]);


    }
    public function ventasplatosmes($mes)
    {

        $year = substr($mes, 0, 4);
        $month = substr($mes, -2);
        $idordens = Orden::where('status', '2')->whereMonth('created_at', '=', $month)->pluck('id');

        $dataplatos = array(); // defined the $data here out of loop
        foreach ($idordens as $key => $idorden) {

            $platos = Orden::find($idorden)->platos;

            if (count($platos) > 0) {
                foreach ($platos as $plato) {
                    $platoid = $plato->pivot->plato_id;
                    $cantidad = $plato->pivot->cantidad;
                    $orden = $plato->pivot->orden_id;
                    $plato = Plato::find($platoid);
                }
                $dataplatos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                    'orden' => $idorden
                ];
            }
        }



        $result = array();
        foreach ($dataplatos as $t) {
            $repeat = false;
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i]['nombre'] == $t['plato']) {
                    $result[$i]['cantidad'] += $t['cantidad'];
                    $repeat = true;
                    break;
                }
            }
            if ($repeat == false)
                $result[] = array('nombre' => $t['plato'], 'cantidad' => $t['cantidad']);
        }





















        return response()->json([
            'data' => $result,
        ]);


    }

    public function prueba()
    {
        $users = User::role('Admin')->get();
        dd($users);

    }


    public function otraprueba()
    {


    }
}






