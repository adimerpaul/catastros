<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::all();
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
        $d=new Persona();
        $d->nombre=$request->nombre;
        $d->apellidos=$request->apellidos;
        $d->ci=$request->ci;
        $d->celular=$request->celular;
        $d->direccion=$request->direccion;
        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($ci)
    {
        $p=Persona::where('ci',$ci)->first();
        return $p;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d=Persona::find($id);
        $d->nombre=$request->nombre;
        $d->apellidos=$request->apellidos;
        $d->ci=$request->ci;
        $d->celular=$request->celular;
        $d->direccion=$request->direccion;
        $d->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Persona::find($id);
        $d->delete($id);
    }
}
