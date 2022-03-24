<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Insumo;
use App\Models\MenuInsumo;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request->input("id");
        $insumos = [];
        if ($id != null){
            $insumos = Insumo::select("insumos.*", "plato_insumos.cantidad as cantidad_c")
                ->join("plato_insumos", "insumos.id", "=", "plato_insumos.insumo_id")
                ->where("plato_insumos.plato_id", $id)
                ->get();
        }
        $menus = Menu::orderBy('created_at', 'DESC')->get();
        return view('menu.index', compact("menus", "insumos" ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all();

        return view("menuinsumo.create", compact("insumos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {

        $input = $request->all();

        try {
            DB::beginTransaction();
            $menu = Menu::create([
                "nombre" => $input["nombre"],
                "costo" => $input["costo"],
                "porciones" => $input["porciones"],
                "status" => '0',
            ]);

            foreach($input["insumo_id"] as $key => $value){
               MenuInsumo::create([
                    "insumo_id"=>$value,
                    "menu_id"=>$menu->id,
                    "cantidad" => $input["cantidades"][$key]
                ]);

                $ins = Insumo::find($value);
                $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);
            }

            DB::commit();
            return redirect("/menus")->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/menus")->with('status', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mirar($id)
    {

        $sqlinsumosmenu="select menu_insumo.cantidad, insumos.nombre, insumos.costo from insumos inner join menu_insumo on menu_insumo.insumo_id=insumos.id inner join menus where menu_insumo.menu_id=menus.id and menus.id=$id";

        $insumosmenu=DB::select($sqlinsumosmenu);

        return response()->json([
            'datamenu' => $insumosmenu,
        ]);
    }
    public function mirarporciones($id)
    {

        $sqlinsumosmenu="select porciones, costo from menus where id=$id";

        $insumosmenu=DB::select($sqlinsumosmenu);

        return response()->json([
            'porcionesmenu' => $insumosmenu,
        ]);


    }
}
