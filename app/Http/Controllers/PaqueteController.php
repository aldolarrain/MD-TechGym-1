<?php

namespace App\Http\Controllers;
use App\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
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
        $paquete = Paquete::join('disciplina','paquete.id_disciplina','=','disciplina.id')
            ->select('paquete.id','paquete.nombre','paquete.descripcion','paquete.cupos', 'paquete.id_disciplina','disciplina.nombre as nom_disciplina','disciplina.descripcion as des_disciplina')
            ->get();
        }
        else{
            $paquete = Paquete::join('disciplina','paquete.id_disciplina','=','disciplina.id')
            ->select('paquete.id','paquete.nombre','paquete.descripcion','paquete.cupos', 'paquete.id_disciplina','disciplina.nombre as nom_disciplina','disciplina.descripcion as des_disciplina')
            ->where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $paquete;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paquete = new Paquete;
        $paquete->nombre=$request->nombre;
        $paquete->descripcion=$request->descripcion;
        $paquete->cupos=$request->cupos;
        $paquete->id_disciplina=$request->id_disciplina;
        $paquete->save();
    }

   
    public function update(Request $request)
    {
        $paquete = Paquete::findOrFail($request->id);
        $paquete->nombre=$request->nombre;
        $paquete->descripcion=$request->descripcion;
        $paquete->cupos=$request->cupos;
        $paquete->id_disciplina=$request->id_disciplina;
        $paquete->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $paquete = Paquete::findOrFail($request->id);
        $paquete->delete();
    }
}
