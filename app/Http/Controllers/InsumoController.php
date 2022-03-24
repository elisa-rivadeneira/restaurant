<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;


class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::all();
        return view('insumo.index')->with('insumos', $insumos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumos = new Insumo();
        $insumos->nombre = $request->get('nombre');
        $insumos->costo = $request->get('costo');
        $insumos->unidad = $request->get('unidad');

        $insumos->save();

        return redirect('/insumos');
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
        $insumo=Insumo::find($id);
        return view('insumo.edit')->with('insumo', $insumo);
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
        $insumo = Insumo::find($id);

        $insumo->nombre = $request->get('nombre');
        $insumo->costo = $request->get('costo');
        $insumo->unidad = $request->get('unidad');

        $insumo->save();

        return redirect('/insumos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Insumo::find($id);
        $insumo->delete();
        return redirect('/insumos');
    }
}
