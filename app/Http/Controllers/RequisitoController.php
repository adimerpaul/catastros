<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Requisito;
use Illuminate\Http\Request;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Requisito::with('detalles')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=new Requisito();
        $d->nombres=$request->nombre;
        $d->descripcion=$request->descripcion;
        $d->save();
        foreach ($request->detalles as $detalle){
            $de=new Detalle();
            $de->nombre=$detalle['nombre'];
            $de->requisito_id=$d->id;
            $de->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function show(Requisito $requisito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisito $requisito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d=Requisito::find($id);
        $d->nombre=$request->nombre;
        $d->descripcion=$request->descripcion;
        $d->save();
        foreach ($request->detalles as $detalle){
            $de=Detalle::find($d->id);
            $de->nombre=$detalle['nombre'];
            $de->requisito_id=$d->id;
            $de->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Requisito::find($id);
        $d->delete($id);
    }
}
