<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Config;
use App\Models\Entrada;
use App\Models\Menu;
use App\Models\Plato;
use App\Models\OrdenPlato;
use App\Models\OrdenMenu;

use App\Models\Mesa;
use App\Models\Orden;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select('SELECT orden_id, ordens.*, sum(cantidad) as porciones from orden_menu join ordens on orden_menu.orden_id = ordens.id  group by orden_id');
        $hoy= Carbon::now();

        $ordenmenus = OrdenMenu::all();
        return view('orden.index', compact('items', 'ordenmenus', 'hoy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $mesas = Mesa::all();
        $platos = Plato::all();
 //       $entradas = Entrada::where('status','1')->get();
        $date_now = date('d-m-Y');
        $last_config_id = DB::table('configs')->latest('id')->first()->id;

        $menus = Menu::select('menus.*','config_menu.porciones')
            ->join('config_menu', 'config_menu.menu_id', '=','menus.id')
            ->where('config_menu.config_id',$last_config_id )
            ->get();

        $entradas = Entrada::select('entradas.*','config_entrada.porciones')
            ->join('config_entrada', 'config_entrada.entrada_id', '=','entradas.id')
            ->where('config_entrada.config_id',$last_config_id )
            ->get();


    //    where('status','1')->innerjoin('config_menu')->where('config_id', $last_config_id)

    //    $ConfigMenu = ConfigMenu::where('config_id', $last_config_id)->get();
        return view("orden.create",  compact("categorias", "platos", "date_now", "entradas", "menus", "mesas"));

    }

    public function crearmenu()
    {
        $categorias = Categoria::all();
        $platos = Plato::all();
        $date_now = date('d-m-Y');
        return view("orden.crearmenu",  compact("categorias", "platos", "date_now"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $orden = Orden::find($id);
        $orden->delete();
        return redirect('/ordens');
    }

    public function status0($id)
    {
        $orden = Orden::find($id);
        $orden->status = '0';
        $orden->save();
        return redirect('/ordens');
    }

    public function status1($id)
    {
        $orden = Orden::find($id);
        $orden->status = '1';
        $orden->tiempo_despacho = Carbon::now();
        $orden->save();
        return redirect('/ordens');
    }

    public function mostrarcobrarplatos($id)
    {
        $platos= Orden::find($id)->platos;
        $dataplatos = array();

        foreach ($platos as $plato) {
            $dataplatos [] = [
                'nombreplato' => $plato->nombre,
                'cantidadplato' => $plato->pivot->cantidad,
                'precioplato' => $plato->precio,
            ];
        }

        return response()->json([
            'dataplatos' => $dataplatos,
        ]);
    }

    public function mostrarcobrarmenus($id)
    {
        $menus = Orden::find($id)->menus;
        $datamenus = array();

        foreach ($menus as $menu) {
            $entradaid = $menu->pivot->entrada_id;
            $entrada = Entrada::find($entradaid);
            $datamenus [] = [
                'cantidadmenu' => $menu->pivot->cantidad,
                'entrada' => $entrada->nombre,
                'menu' => $menu->nombre,
                'precio' => $menu->precio
            ];
        }
        return response()->json([
            'datamenus' => $datamenus,

        ]);
    }

    public function montoacobrar($id){
        $montoacobrar = "select sum(orden_menu.cantidad) as cantidad, ordens.* from ordens join orden_menu on orden_menu.orden_id=ordens.id where ordens.id=$id group by orden_menu.orden_id ";
        $sqlmonto= DB::select($montoacobrar);

        return response()->json([
            'montoacobrar' => $sqlmonto,

        ]);

    }

    public function cobrar($id)
    {
        $orden = Orden::find($id);
        $orden->status = '2';

        $mesa = Mesa::find($orden->mesa);
        $mesa->estado = '0';
        $orden->tiempo_cobro = Carbon::now();
        $orden->save();
        $mesa->save();

        return redirect('/ordens');
    }
}


