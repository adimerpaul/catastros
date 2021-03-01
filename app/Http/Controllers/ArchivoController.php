<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Documento;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Log::with('unit1')->with('unit2')->with('documento')->with('user')->where('estado','!=','FINALIZADO')->where('unit_id2',Auth::user()->unit_id)->get();
        //return Auth::user();
        //return Documento::with('persona')->with('unit')->with('requisito')->WhereDate('created_at',now())->get();
    }
    public function usuario()
    {
//        return Log::with('unit1')->with('unit2')->with('documento')->with('user')->where('estado','!=','FINALIZADO')->where('unit_id2',Auth::user()->unit_id)->get();
        return User::with('unit')->where('id',Auth::user()->id)->first();
        //return Documento::with('persona')->with('unit')->with('requisito')->WhereDate('created_at',now())->get();
//        return 'a';
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
        //
    }

    /**
     * Display the specified rezsource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
