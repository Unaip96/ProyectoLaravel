<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulasUsuarios extends Model
{
    protected $table = 'aula_usuario';
    protected $fillable = ['usuario_id','aula_id'];

    public $timestamps = false;
}
