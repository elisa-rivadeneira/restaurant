<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Mesa::all();
        return view("mesa.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mesa.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'numero'=>'required',
        ));
        $input = $request->all();

        DB::beginTransaction();
            $mesa = Mesa::create(array(
            "numero"=> $input["numero"],
            "sucursal" => $input["sucursal"],
            "piso" => $input["piso"],
            "estado" => '0',


        ));

        DB::commit();

        return redirect("/mesas")->with('grabado','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesa=Mesa::find($id);

        return view('mesa.edit',  compact("mesa"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(array(
            'numero'=>'required',
        ));

        $mesa = Mesa::find($id);

        $mesa->numero = $request->get('numero');
        $mesa->sucursal = $request->get('sucursal');
        $mesa->piso= $request->get('piso');
        $mesa->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesa= Mesa::find($id);
        $mesa->delete();
        return redirect("/mesas")->with("eliminar","ok");
    }
}
