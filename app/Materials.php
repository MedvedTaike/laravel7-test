<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable = ['id_category','id_type','name','authors','description'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category');
    }
    public function type()
    {
        return $this->belongsTo(Types::class, 'id_type');
    }
    public function tags()
    {
    	return $this->belongsToMany(
    		Tags::class,
    		'materials_tags',
    		'material_id',
    		'tag_id'
    	);
    }
    public function links()
    {
        return $this->hasMany(Links::class, 'id_material');
    }
    public static function searchResult($materials)
    {
        $output = '<tbody class="text-white">';
        
        foreach($materials as $material){
            $output .= '<tr>';
                $output .= '<td><a href="'.route('materials.show', ['material' => $material->id]).'">'.$material->name.'</a></td>';
                $output .= '<td>'.$material->authors.'</td>';
                $output .= '<td>'.$material->type->name.'</td>';
                $output .= '<td>'.$material->category->name.'</td>';
            $output .= '</tr>';
        }
        $output .= '</tbody>';

        return $output;
    }
}
