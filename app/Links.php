<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = ['description','link','id_material'];

    public $timestamps = false;

    public function materials()
    {
        return $this->belongsTo(Materials::class, 'id_material');
    }
}
