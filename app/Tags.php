<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['name'];

    public function materials()
    {
    	return $this->belongsToMany(
    		Materials::class,
    		'materials_tags',
    		'tag_id',
    		'material_id'
    	);
    }
}
