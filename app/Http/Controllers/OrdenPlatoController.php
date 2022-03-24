<?php

namespace App\Http\Controllers;
use App\Models\ConfigMenu;
use App\Models\ConfigEntrada;
use App\Models\Entrada;
use App\Models\Menu;
use App\Models\OrdenPlato;
use App\Models\OrdenMenu;
use App\Models\OrdenEntrada;
use App\Models\Orden;
use App\Models\Plato;
use App\Models\Mesa;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenPlatoController extends Controller
{
    public function save(Request $request)
    {

        $request->validate(array(
            'mesa'=>'required',
        ));
        $last_config_id = DB::table('configs')->latest('id')->first()->id;

        $input = $request->all();
        $preciomenu = Config::latest('updated_at')->first()->preciomenu;;
        $idmesa = $input["mesa"];
        $mesa = Mesa::find($idmesa);
        $mesa->estado = '1';
        $mesa->save();

        $pagarmesa= $input['cantmenus'] * $preciomenu;


    try {
        DB::beginTransaction();

        $orden = Orden::create([
            "mesa" => $input["mesa"],
            "total" => $pagarmesa,
            "status" => "0"

        ]);

        $last_config_id = DB::table('config_menu')->latest('config_id')->first()->config_id;
        $menuss = ConfigMenu::where('config_id',$last_config_id)->get();
        $entradass = ConfigEntrada::where('config_id',$last_config_id)->get();

        if (isset($input["cantidadmenu"])){
                  foreach ($input["cantidadmenu"] as $key => $value) {
                      if ($input["cantidadmenu"][$key] != 0) {
                          OrdenMenu::create([
                              "menu_id" => $input["menu_id"][$key],
                              "orden_id" => $orden->id,
                              "cantidad" => $input["cantidadmenu"][$key],
                              "estado" => "0"

                          ]);


                      }
                  }

            if (isset($input["menu_id"])) {
                foreach ($input["menu_id"] as $key => $value) {
                   foreach($menuss as $menu){
                      if($menu->menu_id == $input["menu_id"][$key] ){

                          $porc = ConfigMenu::find($menu->id);
                          $nuevacantidad = $porc->porciones - $input["cantidadmenu"][$key];
                          $porc->porciones =$nuevacantidad;
                          $porc->update();

                      }
                   }

                }
            }

            foreach ($input["cantidadentrada"] as $key => $value) {
                if ($input["cantidadentrada"][$key] != 0) {
                    OrdenEntrada::create([
                        "orden_id" => $orden->id,
                        "entrada_id" => $input["entrada_id"][$key],
                        "cantidad" => $input["cantidadentrada"][$key],
                        "estado" => "0"
                    ]);
                }
            }

            if (isset($input["entrada_id"])) {
                foreach ($input["entrada_id"] as $key => $value) {
                    foreach($entradass as $entrada){
                        if($entrada->entrada_id == $input["entrada_id"][$key] ){
                            $porc = ConfigEntrada::find($entrada->id);
                            $nuevacantidad = $porc->porciones - $input["cantidadentrada"][$key];
                            $porc->porciones =$nuevacantidad;
                            $porc->update();
                        }
                    }

                }
            }





}




            DB::commit();
            return redirect("/ordens")->with('status', '1');
        } catch (\Exception $e) {
        dd('ha habido un error esta aqui', $e);
            DB::rollBack();
            //  return redirect("/ordens")->with('status', $e->getMessage());
        }
    }

    public function show($id)
    {
        $ordenplato = OrdenPlato::find($id);

        return response()->json([
            'data' => $ordenplato
        ]);



    }

    public function mirar($id)
    {

       $sqlplatos="select orden_plato.cantidad, platos.precio, platos.nombre as plato from platos inner join orden_plato where orden_plato.plato_id=platos.id and orden_plato.orden_id=$id";

       $ordenplatos=DB::select($sqlplatos);

        return response()->json([
            'dataplato' => $ordenplatos,
        ]);
    }

    public function mirarmenus($id)
    {

        $sqlmenus = "select orden_menu.*, menus.nombre from orden_menu join menus on orden_menu.menu_id = menus.id join ordens on orden_menu.orden_id=ordens.id where ordens.id=$id";
        $sqlorden= DB::select($sqlmenus);


        return response()->json([
            'datamenus' => $sqlorden,

        ]);
    }

    public function mirarentradas($id)
    {

        $sqlentradas = "select orden_entrada.*, entradas.nombre from orden_entrada join entradas on orden_entrada.entrada_id = entradas.id join ordens on orden_entrada.orden_id=ordens.id where ordens.id=$id";
        $sqlorden= DB::select($sqlentradas);


        return response()->json([
            'dataentradas' => $sqlorden,

        ]);
    }




    public function mirarmenusbackup($id)
    {

        $menus = Orden::find($id)->menus;
        $data = array(); // defined the $data here out of loop

        foreach ($menus as $menu) {
            $entradaid = $menu->pivot->entrada_id;
            $entrada = Entrada::find($entradaid);

            $data [] = [
                'cantidad' => $menu->pivot->cantidad,
                'entrada' => $entrada->nombre,
                'menu' => $menu->nombre
            ];
        }
        return response()->json([
            'datamenu' => $data,
        ]);
    }


    public function getPlato($id){
        $platos=Plato::where('categoria_id',$id)->get();
        return json_encode($platos);
    }


    public function getPrecio($id){
        $plato=Plato::find($id)->get();
        return $plato;
    }

    public function calcular_precio($platos, $cantidades)
    {
        $precioorden = 0;
        foreach ($platos as $key => $value){
            $plato = Plato::find($value);
            $precioorden += ($plato->precio * $cantidades[$key]);
        }
        return $precioorden;
    }

}



