<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table="horario";
    protected $fillable=[
        'horainicio',
        'horafin',
        'id_disciplina'
    ];
    public $timestamps=false;
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }
}
