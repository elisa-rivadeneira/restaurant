<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatoInsumo;
use App\Models\Plato;
use App\Models\Insumo;
use Illuminate\Support\Facades\DB;

class PlatoInsumoController extends Controller
{
    public function save(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $plato = Plato::create([
                "nombre" => $input["nombre"],
                "categoria_id" => $input["categoria_id"],
                "costo" => $this->calcular_precio($input["insumo_id"], $input["cantidades"]),
                "precio" => $input["precio"]
            ]);

            foreach($input["insumo_id"] as $key => $value){
                PlatoInsumo::create([
                    "insumo_id"=>$value,
                    "plato_id"=>$plato->id,
                    "cantidad" => $input["cantidades"][$key]
                ]);

                $ins = Insumo::find($value);
                $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);
            }

            DB::commit();
            return redirect("/plato/listar")->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/plato/listar")->with('status', $e->getMessage());
        }
    }

    public function calcular_precio($insumos, $cantidades)
    {
        $costoplato = 0;
        foreach ($insumos as $key => $value){
            $insumo = Insumo::find($value);
            $costoplato += ($insumo->costo * $cantidades[$key]);
        }
        return $costoplato;
    }

    public function show(Request $request){

        $id = $request->input("id");
        $insumos = [];
        if ($id != null){
            $insumos = Insumo::select("insumos.*", "plato_insumos.cantidad as cantidad_c")
            ->join("plato_insumos", "insumos.id", "=", "plato_insumos.insumo_id")
            ->where("plato_insumos.plato_id", $id)
            ->get();
        }

        $platos = Plato::select("platos.*", "categorias.nombre as categoria")
        ->join ("categorias", "categorias.id", "=", "platos.categoria_id")
        ->get();

        return view("platoinsumo.show", compact("platos", "insumos", ));
    }
}
