<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Persona;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Documento::with('persona')->with('unit')->with('requisito')->WhereDate('created_at',now())->get();
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
        $persona=Persona::where('ci',$request->ci)->get();
        if($persona->count()==0){
            $p=new Persona();
            $p->ci=$request->ci;
            $p->nombre=$request->nombre;
            $p->apellidos=$request->apellidos;
            $p->save();
            $persona_id=$p->id;
        }else{
            $p=Persona::find($persona[0]->id);
            //$p->ci=$request->ci;
            $p->nombre=$request->nombre;
            $p->apellidos=$request->apellidos;
            $p->save();
            $persona_id=$persona[0]->id;
        }
        
        $d=new Documento();
        /*
        $d->ci=$request->ci;
        $d->nombre=$request->nombre;
        $d->apellidos=$request->apellidos;
        $d->nroHojas=$request->nroHojas;
        $d->unidad=$request->unidad;
        $d->tipoTra=$request->tipoTra;

        */
        $d->codigounidad=$request->codigounidad;
        $d->instruccion=$request->instruccion;
        $d->nroHojas=$request->nroHojas;
        $d->persona_id=$persona_id;
        $d->unit_id=$request->unit_id;
        $d->requisito_id=$request->requisito_id;

        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d=Documento::find($id);        
        $d->ci=$request->ci;
        $d->nombre=$request->nombre;
        $d->apellidos=$request->apellidos;
        $d->nroHojas=$request->nroHojas;
        $d->unidad=$request->unidad;
        $d->tipoTra=$request->tipoTra;
        
        $d->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Documento::find($id);
        $d->delete();
    }
}
