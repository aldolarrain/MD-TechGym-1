<?php

namespace App\Http\Controllers;

use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplina=Disciplina::all();
        return ['disciplina'=>$disciplina];
    }

    
    

   
    public function store(Request $request)
    {
        $disciplina = new Disciplina;
        $disciplina->nombre=$request->nombre;
        $disciplina->descripcion=$request->descripcion;
        $disciplina->save();
    }
    public function selectDisciplina(){
        $disciplina= Disciplina::select('id','nombre','descripcion')->get();
        return $disciplina;
    }

    
  
    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
