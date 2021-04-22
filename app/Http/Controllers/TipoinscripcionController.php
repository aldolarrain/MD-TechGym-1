<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipoinscripcion;

class TipoinscripcionController extends Controller
{
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $tipoinscripcion=Tipoinscripcion::all();
        }
        else{
            $tipoinscripcion=Tipoinscripcion::where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $tipoinscripcion;
    }

    public function store(Request $request)
    {
        $tipoinscripcion = new tipoinscripcion;
        $tipoinscripcion->nombre=$request->nombre;
        $tipoinscripcion->precio=$request->precio;
        $tipoinscripcion->periodo=$request->periodo;
        $tipoinscripcion->frecuencia=$request->frecuencia;
        $tipoinscripcion->save();
    }

    public function update(Request $request){
        $tipoinscripcion = Tipoinscripcion::findOrFail($request->id);
        $tipoinscripcion->nombre=$request->nombre;
        $tipoinscripcion->precio=$request->precio;
        $tipoinscripcion->periodo=$request->periodo;
        $tipoinscripcion->frecuencia=$request->frecuencia;
        $tipoinscripcion->save();
    }

    public function delete(Request $request){
        $tipoinscripcion = Tipoinscripcion::findOrFail($request->id);
        $tipoinscripcion->delete();
    }
}
