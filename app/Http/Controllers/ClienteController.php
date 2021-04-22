<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $cliente=Cliente::all();
        }
        else{
            $cliente=Cliente::where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $cliente;
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nombre=$request->nombre;
        $cliente->apellido=$request->apellido;
        $cliente->save();
    }
    

    public function update(Request $request){
        $cliente = Cliente::findOrFail($request->id);
        $cliente->nombre=$request->nombre;
        $cliente->apellido=$request->apellido;
        $cliente->save();
    }

    public function delete(Request $request){
        $cliente = Cliente::findOrFail($request->id);
        $cliente->delete();
    }

    public function selectCliente(Request $request){
        $cliente= Cliente::select('id','nombre','apellido')->get();
        return $cliente;
    }

}
