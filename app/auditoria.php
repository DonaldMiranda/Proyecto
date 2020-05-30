<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auditoria extends Model
{
    protected $table ="usuario_auditoria";

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'user_id', 'id');
    }
}
