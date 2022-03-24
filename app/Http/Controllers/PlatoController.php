<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Plato;
use App\Models\Insumo;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();
        return view('plato.index')->with('platos', $platos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $insumos = Insumo::all();

        return view("platoinsumo.create", compact("categorias", "insumos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $platos = new Plato();
        $platos->descripcion = $request->get('descripcion');
        $platos->precio = $request->get('precio');

        $platos->save();

        return redirect('/platos');
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
        $plato=Plato::find($id);
        return view('plato.edit')->with('plato', $plato);
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
        $plato = Plato::find($id);

        $plato->descripcion = $request->get('descripcion');
        $plato->precio = $request->get('precio');

        $plato->save();

        return redirect('/platos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plato = Plato::find($id);
        $plato->delete();
        return redirect('/platos');
    }

    public function costo($id)
    {

        $plato = Plato::find($id);
        $insumos = Insumo::all();

        return view('plato.costo')->with('insumos', $insumos)->with('plato', $plato);

    }
}
