<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];

    public function materials()
    {
        return $this->hasMany(Materials::class, 'id_category');
    }
}
