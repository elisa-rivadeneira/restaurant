<?php

namespace App\Http\Controllers;

use App\Models\ConfigMenu;
use App\Models\Orden;
use App\Models\Plato;
use App\Models\Menu;
use App\Models\Entrada;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Config;

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
        $preciomenu = DB::table('configs')->latest('id')->first()->preciomenu;


        $totalventashoy = Orden::whereDate('created_at', '=', $diaconfig)
            ->get();
        $nroventas = count($totalventashoy);
        $sumadeventas =Orden::sum('total');

        $ventas = $sumadeventas / 7;



        $idconfigultimo = DB::table('configs')->latest('id')->first()->id;

        $idconfigsdia=DB::table('configs')->whereDate('created_at', '=',  $diaconfig)->pluck('id');


        $datosmenur= array();
        $datosentradar= array();
        $menurs = Config::find($idconfigultimo)->menus;


            foreach ($menurs as $menur) {
            $menuid = $menur->menu_id;
            $cantidadmenuini = $menur->porcionesini;
            $cantidadmenures = $menur->porciones;
            $plato = Menu::find($menuid);

            $datosmenur [] = [
                'idmenu' => $menuid,
                'cantidadmenuini' => $cantidadmenuini,
                'cantidadmenures' => $cantidadmenures,
                'cantidadmenuven' => $cantidadmenuini - $cantidadmenures,
                'plato' => $plato->nombre,
                'costo' => $plato->costo,

                'sumaxplato' => $cantidadmenuini * $plato->costo
            ];



            }




        $menuspreparados = '0';
        $sumatotal = '0';
        if(isset($datosmenur)){
            foreach ($datosmenur as $datomenu){

                $sumatotal = $datomenu['sumaxplato'] + $sumatotal;
                $menuspreparados = $datomenu['cantidadmenuini'] + $menuspreparados;

            }}

        $entradars = Config::find($idconfigultimo)->entradas;
            foreach ($entradars as $entradar) {
                $entradaid = $entradar->entrada_id;
                $cantidadini = $entradar->porcionesini;
                $cantidadres = $entradar->porciones;
                $plato = Entrada::find($entradaid);

                $datosentradar [] = [
                    'idmenu' => $entradaid,
                    'cantidadini' => $cantidadini,
                    'cantidadres' => $cantidadres,
                    'cantidadven' => $cantidadini - $cantidadres,
                    'plato' => $plato->nombre,
                    'costo' => $plato->costo,

                    'sumaxplato' => $cantidadini * $plato->costo
                ];
            }







        //fin egresos

        $idordens = Orden::whereDate('created_at', '=',  $diaconfig)->pluck('id');


        $datos = array(); // defined the $data here out of loop
        $datosentrada = array();
        $totalmenusvendidos = '0';
        $platosvendidos = '0';


        foreach ($idordens as $idorden) {

            $menus = Orden::find($idorden)->menus;
            $entradas = Orden::find($idorden)->entradas;

            foreach ($menus as $menu) {
                $menuid = $menu->pivot->menu_id;
                $cantidad = $menu->pivot->cantidad;

                $plato = Menu::find($menuid);

                $datos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                ];
            }
            if(isset($datos)){
                foreach($datos as $dato){
                    $platosvendidos = $dato['cantidad'] + $platosvendidos;
                }
            }

            $totalmenusvendidos = $platosvendidos * $preciomenu;


            foreach ($entradas as $entrada) {
                $entradaid = $entrada->pivot->entrada_id;
                $cantidad = $entrada->pivot->cantidad;
                $plato = Entrada::find($entradaid);

                $datosentrada [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                ];

            }

        }



        return view('venta.diario')->with('items', $totalventashoy)->with('ventas', $ventas)->with('totalmenusvendidos', $totalmenusvendidos)->with('platosvendidos', $platosvendidos)->with('datos', $datos)->with('diaconfig', $diaconfig)->with('datosentrada', $datosentrada)->with('datosmenur', $datosmenur)->with('datosentradar', $datosentradar)->with('sumatotal', $sumatotal)->with('menuspreparados', $menuspreparados);


    }


public function seleccionadia(){
    $diaconfig = DB::table('configs')->latest('id')->first()->dia;
    return view('venta.seleccionardia', compact('diaconfig'));
}

public function seleccionardia($dia){
    $diaconfig = $dia;

    $preciomenu = DB::table('configs')->latest('id')->first()->preciomenu;

    $idconfiguno = DB::table('configs')->orderBy('id', 'asc')->first()->id;
    $idconfigg =DB::table('configs')->whereDate('dia', '=',  $diaconfig)->first();
    if(isset($idconfigg)){
        $idconfigdia = $idconfigg->id;
    }else{
        $idconfigdia = $idconfiguno;
    }





    $totalventashoy = Orden::whereDate('created_at', '=', $diaconfig)
        ->get();
    $nroventas = count($totalventashoy);
    $sumadeventas =Orden::whereDate('created_at', '=',  $diaconfig)->sum('total');

    $ventas = $sumadeventas / $preciomenu;






  //  $idconfigsdia=DB::table('configs')->whereDate('created_at', '=',  $diaconfig)->pluck('id');


    $datosmenur= array();
    $datosentradar= array();
    $menurs = Config::find($idconfigdia)->menus;


    foreach ($menurs as $menur) {
        $menuid = $menur->menu_id;
        $cantidadmenuini = $menur->porcionesini;
        $cantidadmenures = $menur->porciones;
        $plato = Menu::find($menuid);

        $datosmenur [] = [
            'idmenu' => $menuid,
            'cantidadmenuini' => $cantidadmenuini,
            'cantidadmenures' => $cantidadmenures,
            'cantidadmenuven' => $cantidadmenuini - $cantidadmenures,
            'plato' => $plato->nombre,
            'costo' => $plato->costo,

            'sumaxplato' => $cantidadmenuini * $plato->costo
        ];

    }

    $menuspreparados = '0';
    $sumatotal = '0';
    if(isset($datosmenur)){
        foreach ($datosmenur as $datomenu){

            $sumatotal = $datomenu['sumaxplato'] + $sumatotal;
            $menuspreparados = $datomenu['cantidadmenuini'] + $menuspreparados;

        }}

    $entradars = Config::find($idconfigdia)->entradas;
    foreach ($entradars as $entradar) {
        $entradaid = $entradar->entrada_id;
        $cantidadini = $entradar->porcionesini;
        $cantidadres = $entradar->porciones;
        $plato = Entrada::find($entradaid);

        $datosentradar [] = [
            'idmenu' => $entradaid,
            'cantidadini' => $cantidadini,
            'cantidadres' => $cantidadres,
            'cantidadven' => $cantidadini - $cantidadres,
            'plato' => $plato->nombre,
            'costo' => $plato->costo,

            'sumaxplato' => $cantidadini * $plato->costo
        ];
    }







    //fin egresos

    $idordens = Orden::whereDate('created_at', '=',  $diaconfig)->pluck('id');


    $datos = array(); // defined the $data here out of loop
    $datosentrada = array();
    $totalmenusvendidos = '0';
    $platosvendidos = '0';


    foreach ($idordens as $idorden) {

        $menus = Orden::find($idorden)->menus;
        $entradas = Orden::find($idorden)->entradas;

        foreach ($menus as $menu) {
            $menuid = $menu->pivot->menu_id;
            $cantidad = $menu->pivot->cantidad;

            $plato = Menu::find($menuid);

            $datos [] = [
                'cantidad' => $cantidad,
                'plato' => $plato->nombre,
            ];
        }
        if(isset($datos)){
            foreach($datos as $dato){
                $platosvendidos = $dato['cantidad'] + $platosvendidos;
            }
        }

        $totalmenusvendidos = $platosvendidos * $preciomenu;


        foreach ($entradas as $entrada) {
            $entradaid = $entrada->pivot->entrada_id;
            $cantidad = $entrada->pivot->cantidad;
            $plato = Entrada::find($entradaid);

            $datosentrada [] = [
                'cantidad' => $cantidad,
                'plato' => $plato->nombre,
            ];

        }

    }

    return view('venta.diario', compact('diaconfig', 'ventas', 'totalmenusvendidos', 'menuspreparados', 'sumatotal', 'datosmenur', 'datosentradar'));

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
                $cantidadini = $plato->pivot->cantidadini;
                $plato = Plato::find($platoid);

                $datos [] = [
                    'cantidad' => $cantidad,
                    'plato' => $plato->nombre,
                    'cantidadini' => $cantidadini,
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






