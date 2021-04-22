<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notainscripcion;

class NotainscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        if($buscar==''){
            $notainscripcion =Notainscripcion::join('cliente','notainscripcion.id_cliente','=','cliente.id')
            ->select('notainscripcion.id','notainscripcion.fecha','notainscripcion.id_cliente','cliente.nombre as nom_cliente','cliente.apellido as ape_cliente')
            ->get();
        }
        else{
            $notainscripcion =Notainscripcion::join('cliente','notainscripcion.id_cliente','=','cliente.id')
            ->select('notainscripcion.id','notainscripcion.fecha','notainscripcion.id_cliente','cliente.nombre as nom_cliente','cliente.apellido as ape_cliente')
            ->where('fecha','like','%'.$buscar.'%')
            ->get();
        }
        return $notainscripcion;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notainscripcion = new Notainscripcion;
        $notainscripcion->fecha=$request->fecha;
        //$notainscripcion->id_tipoinscripcion=$request->id_tipoinscripcion;
        $notainscripcion->id_cliente=$request->id_cliente;
        $notainscripcion->save();
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
        $notainscripcion = Notainscripcion::findOrFail($request->id);
        $notainscripcion->fecha=$request->fecha;
        $notainscripcion->id_cliente=$request->id_cliente;
        $notainscripcion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $notainscripcion = Notainscripcion::findOrFail($request->id);
        $notainscripcion->delete();
    }
}
