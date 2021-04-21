<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = "disciplina";
    protected $fillable=[
        'nombre',
        'descripcion'

    ];

    public $timestamps=false;
    public function horario(){
        return $this->hasMany('App\Horario');
    }
}