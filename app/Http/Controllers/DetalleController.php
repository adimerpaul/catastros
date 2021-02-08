<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detalle::all();
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
        $d=new Detalle();
        $d->codDetalle=$request->codDetalle;
        $d->nroDoc=$request->nroDoc;
        $d->descripcion=$request->descripcion;
        $d->localizacion=$request->localizacion;
        $d->usuario=$request->usuario;
        $d->idDocumento=$request->idDocumento;
        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle $detalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle $detalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $d=Detalle::find($id);
        $d->codDetalle=$request->codDetalle;
        $d->nroDoc=$request->nroDoc;
        $d->descripcion=$request->descripcion;
        $d->localizacion=$request->localizacion;
        $d->usuario=$request->usuario;
        $d->idDocumento=$request->idDocumento;
        $d->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Detalle::find($id);
        $d->delete();
    }
}
