<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function materials()
    {
        return $this->hasMany(Materials::class, 'id_type');
    }
}
