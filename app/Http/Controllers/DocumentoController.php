<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Persona;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        
        $d->codigounidad=$request->codigounidad;
        $d->instruccion=$request->instruccion;
        $d->celular=$request->celular;
        $d->nroHojas=$request->nroHojas;
        $d->persona_id=$persona_id;
        $d->unit_id=$request->unit_id;  
        
        $d->user_id=Auth::user()->id;
        $d->requisito_id=$request->requisito_id;
        //return Auth::user()->id;
        //exit;
        $d->save();
        
        
        $l=new Log();
        $l->documento_id=$d->id;
        $l->user_id=Auth::user()->id;
        $l->unit_id1=Auth::user()->unit_id;
        $l->unit_id2=$request->unit_id;
        $l->save();
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
        $persona=Persona::where('ci',$request->ci)->get();
        if($persona->count()!=0){
            $p->nombre=$request->nombre;
            $p->apellidos=$request->apellidos;
            $p->save();
            $persona_id=$persona[0]->id;
        }        
        $d->codigounidad=$request->codigounidad;
        $d->instruccion=$request->instruccion;
        $d->nroHojas=$request->nroHojas;
        $d->persona_id=$persona_id;
        $d->unit_id=$request->unit_id;
        $d->requisito_id=$request->requisito_id;
        
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
    public function numero(){
        $wordlist = Documento::whereYear('created_at', now())->get();
        $wordCount = $wordlist->count();
        return $wordCount+1;
    }
}
