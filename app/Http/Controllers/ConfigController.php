<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Entrada;
use App\Models\Categoria;
use App\Models\Config;
use App\Models\ConfigMenu;
use App\Models\ConfigEntrada;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ConfigController extends Controller
{

    public function index(Request $request){

        Carbon::setLocale('es');


    $categorias = Categoria::all();
    $last_config_id = DB::table('configs')->latest('id')->first()->id;
        $diaconfig =$last_config_id = DB::table('configs')->latest('id')->first()->dia;
        $fecha = Carbon::parse($diaconfig)->toFormattedDateString();
        $platos = Plato::all();
    $menus = Menu::all();
    $entradas = Entrada::all();

    $configultimo='';
    $preciomenu='7';
    $configmenus='';
    $configentradas='';
    if(isset($last_config_id)){
    $last_config_id = DB::table('configs')->latest('id')->first()->id;
    $configultimo = Config::find($last_config_id)->dia;
    $preciomenu = Config::find($last_config_id)->preciomenu;

    }



        if (!empty($last_config_id)) {

            $configmenus = Menu::select("menus.nombre","menus.status", "menus.id", "config_menu.porciones as porciones")
                ->join("config_menu", "menus.id", "=", "config_menu.menu_id")
                ->where("config_menu.config_id", $last_config_id)
                ->get();

            $configentradas = Entrada::select("entradas.nombre", "entradas.id", "config_entrada.porciones as porciones")
                ->join("config_entrada", "entradas.id", "=", "config_entrada.entrada_id")
                ->where("config_entrada.config_id", $last_config_id)
                ->get();
        }

    return view('config.index', compact( 'fecha', 'last_config_id','configultimo','platos', 'menus', 'entradas', 'categorias', 'configmenus', 'preciomenu', 'configentradas'));

    }

    public function create()
    {
        $platos = Plato::all();
        $categorias = Categoria::all();
        $menus = Menu::all();
        $entradas = Entrada::all();
        $dia = Carbon::today()->toDateString();
        $last_config_id = DB::table('configs')->latest('id')->first()->id;
        $configultimo = Config::find($last_config_id);
        $preciomenu = $configultimo->preciomenu;




        return view('config.create', compact('preciomenu','menus', 'entradas', 'dia', 'categorias', 'platos'));


    }


    public function edit($id)
    {
        $platos = Plato::all();
        $categorias = Categoria::all();
        $menus = Menu::all();
        $entradas = Entrada::all();
        $dia = Carbon::today()->toDateString();
        $last_config_id = DB::table('configs')->latest('id')->first()->id;
        $configultimo = Config::find($last_config_id);
        $preciomenu = $configultimo->preciomenu;

            $configmenus = Menu::select("menus.nombre","menus.status", "menus.id", "config_menu.porciones as porciones")
                ->join("config_menu", "menus.id", "=", "config_menu.menu_id")
                ->where("config_menu.config_id", $id)
                ->get();

            $configentradas = Entrada::select("entradas.nombre", "entradas.id", "config_entrada.porciones as porciones")
                ->join("config_entrada", "entradas.id", "=", "config_entrada.entrada_id")
                ->where("config_entrada.config_id", $id)
                ->get();


   //     $configid=Config::find($id);
    //      return view('insumo.edit')->with('insumo', $insumo);


        return view('config.edit', compact('id','preciomenu','menus', 'entradas', 'dia', 'categorias', 'platos', 'configmenus', 'configentradas'));


    }

    public function update(Request $request,$id){
        $input = $request->all();
        $menus = Menu::all();
        $entradas = Entrada::all();


        $config = Config::find($id);


        $config->dia = $request->get('dia');
        $config->preciomenu = $request->get('preciomenu');
        $config->save();


        $configmenus = Configmenu::where('config_id', $id)->delete();
        $configentradas = Configentrada::where('config_id', $id)->delete();



        try {

            DB::beginTransaction();

            if (isset($input["menu_id"])){

                foreach($menus as $menu){
                    $menu->status = '0';
                    $menu->save();
                }
                foreach ($input["menu_id"] as $key => $value) {
                    ConfigMenu::create([
                        "config_id" => $config->id,
                        "menu_id" => $value,
                        "porciones" => $input["porciones"][$key]
                    ]);

                    $menu = Menu::find($value);
                    $menu->status = '1';
                    $menu->save();

                }
            }

            if (isset($input["entrada_id"])){

                foreach($entradas as $entrada){
                    $entrada->status = '0';
                    $entrada->save();
                }
                foreach ($input["entrada_id"] as $key => $value) {
                    ConfigEntrada::create([
                        "config_id" =>  $config->id,
                        "entrada_id" => $value,
                        "porciones" => $input["porcionesentrada"][$key]
                    ]);

                    $entrada = Entrada::find($value);
                    $entrada->status = '1';
                    $entrada->save();
                }
            }
            DB::commit();
            return redirect("/config")->with('status', '1');
        } catch (\Exception $e) {
            dd('ha habido un error esta aqui', $e);
            DB::rollBack();
            //  return redirect("/ordens")->with('status', $e->getMessage());
        }












        return redirect('/config');

    }


    public function store(Request $request)
    {
        $input = $request->all();
        $menus = Menu::all();



        try {

            DB::beginTransaction();

            $config = new Config();
            $config->dia = $request->get('dia');
            $config->preciomenu = $request->get('preciomenu');
            $config->save();

            if (isset($input["menu_id"])){

                foreach($menus as $menu){
                    $menu->status = '0';
                    $menu->save();
                }
                    foreach ($input["menu_id"] as $key => $value) {
                        ConfigMenu::create([
                            "config_id" => $config->id,
                            "menu_id" => $value,
                            "porciones" => $input["porciones"][$key],
                            "porcionesini" => $input["porciones"][$key]

                        ]);

                        $menu = Menu::find($value);
                        $menu->status = '1';
                        $menu->save();

                    }
                }

            if (isset($input["entrada_id"])){
                foreach ($input["entrada_id"] as $key => $value) {
                    ConfigEntrada::create([
                        "config_id" =>  $config->id,
                        "entrada_id" => $value,
                        "porciones" => $input["porcionesentrada"][$key],
                        "porcionesini" => $input["porcionesentrada"][$key]
                   ]);
                }
            }
            DB::commit();
            return redirect("/config")->with('status', '1');
        } catch (\Exception $e) {
            dd('ha habido un error esta aqui', $e);
            DB::rollBack();
            //  return redirect("/ordens")->with('status', $e->getMessage());
        }


    }
        public function destroyentrada($id){

            $configentrada = ConfigEntrada::find($id);
            $configentrada->delete();
            return redirect('/config');
        }
}
