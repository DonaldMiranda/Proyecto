<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table="usuario";

     public function registro_sesion()
    {
      return $this->hasMany('App\auditoria', 'user_id', 'id');
    }
}
