<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;

class AdministradorController extends Controller
{
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $administrador=Administrador::all();
        }
        else{
            $administrador=Administrador::where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $administrador;
    }

    public function store(Request $request)
    {
        $administrador = new administrador;
        $administrador->nombre=$request->nombre;
        $administrador->apellido=$request->apellido;
        $administrador->contrasenia=$request->contrasenia;
        $administrador->save();
    }

    public function update(Request $request){
        $administrador = Administrador::findOrFail($request->id);
        $administrador->nombre=$request->nombre;
        $administrador->apellido=$request->apellido;
        $administrador->contrasenia=$request->contrasenia;
        $administrador->save();
    }

    public function delete(Request $request){
        $administrador = Administrador::findOrFail($request->id);
        $administrador->delete();
    }
}
