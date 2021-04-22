<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table="paquete";
    protected $fillable=[
        'nombre',
        'descripcion',
        'cupos',
        'id_disciplina'
    ];
    public $timestamps=false;
    public function disciplina(){
        return $this->hasMany('App\Disciplina');
    }
}
