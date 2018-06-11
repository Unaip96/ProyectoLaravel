<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['id','nombre','aula_id'];

    public function Aula(){
    	return $this->belongsTo('App\Aula');
    }

    public $timestamps = false;
    //
}
