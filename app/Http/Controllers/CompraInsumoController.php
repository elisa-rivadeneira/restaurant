<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Insumo;
use App\Models\CompraInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraInsumoController extends Controller
{
    public function save(Request $request)
    {

        $request->validate(array(
            'dia_compra'=>'required',
            'mediodepago'=>'required',
            'proveedor'=>'required',

        ));

        $input = $request->all();

        try {
            DB::beginTransaction();
            $compra = Compra::create([
                "proveedor_id" => $input["proveedor"],
                "dia_compra" => $input["dia_compra"],
                "metododepago" => $input["mediodepago"],
                "total" => $input["precio_total"]
            ]);

            foreach($input["insumo_id"] as $key => $value){
                CompraInsumo::create([
                    "insumo_id"=>$value,
                    "compra_id"=>$compra->id,
                    "cantidad" => $input["cantidades"][$key],
                    "costo" => $input["costos"][$key]
                ]);


                $ins = Insumo::find($value);
                $ins->cantidad =  $ins->cantidad + $input["cantidades"][$key];
                $ins->save();


              //  $ins->update(["cantidad"=> ($ins->cantidad + $input["cantidades"][$key]), "costo" => $input["costos"][$key]]);




            }



            DB::commit();
            return redirect("/compras")->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            //return redirect("/compras")->with('status', $e->getMessage());
        }
    }

    public function mirar($id)
    {

        $sqlcompras="select compras.total, compra_insumo.cantidad, compra_insumo.costo, insumos.nombre from compras inner join compra_insumo on compra_insumo.compra_id=compras.id inner join insumos on insumos.id=compra_insumo.insumo_id where compras.id = compra_insumo.compra_id";

        $compras=DB::select($sqlcompras);

        return response()->json([
            'dataplato' => $compras,
        ]);
    }

}
