<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorarioController extends Controller
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
        $horario = Horario::join('disciplina','horario.id_disciplina','=','disciplina.id')
            ->select('horario.id', 'horario.horainicio','horario.horafin','horario.id_disciplina','disciplina.nombre as nom_disciplina','disciplina.descripcion as des_disciplina')
            ->get();
        }
        else{
            $horario = Horario::join('disciplina','horario.id_disciplina','=','disciplina.id')
            ->select('horario.id', 'horario.horainicio','horario.horafin','horario.id_disciplina','disciplina.nombre as nom_disciplina','disciplina.descripcion as des_disciplina')
            ->where('horainicio','like','%'.$buscar.'%')
            ->get();
        }
        return $horario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario = new Horario;
        $horario->horainicio=$request->horainicio;
        $horario->horafin=$request->horafin;
        $horario->id_disciplina=$request->id_disciplina;
        $horario->save();
    }

   
    public function update(Request $request)
    {
        $horario = Horario::findOrFail($request->id);
        $horario->horainicio=$request->horainicio;
        $horario->horafin=$request->horafin;
        $horario->id_disciplina=$request->id_disciplina;
        $horario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $horario = Horario::findOrFail($request->id);
        $horario->delete();
    }
}
