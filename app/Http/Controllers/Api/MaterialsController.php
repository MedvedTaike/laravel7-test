<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Links;
use App\Materials;
use Illuminate\Validation\Rule;
use App\Http\Resources\MaterialCollection;
use Illuminate\Database\Eloquent\Builder;

class MaterialsController extends Controller
{
    public function createLink(Request $request, $id)
    {
        $validator = \Validator::make($request->all(),[ 
            'description' =>'string|nullable',
            'link' => 'required|url|unique:links'
        ]);

        if ($validator->fails()) {
           return response()->json($validator->errors()->first(), 422);
        }
        $data = $validator->attributes();
        $data['id_material'] = $id;

        Links::create($data);

        return response('Ссылка создана!', 201);
    }
    public function updateLink(Request $request, $id)
    { 
        $validator = \Validator::make($request->all(),[ 
            'description' =>'string|nullable',
            'link' => ['required', Rule::unique('links')->ignore($id)]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
         }
        $data = $validator->attributes();
        
        Links::find($id)->update($data);

        return response('Ссылка отредактирована!', 200);
    }
    public function searchByName(Request $request)
    {
        $query = $request->get('query');

        $materials = Materials::where('name', 'like', '%'.$query.'%')->get();

        if($materials->isEmpty()){
            return response('Нет данных!!!', 422);
        }

        $output = Materials::searchResult($materials);

        return $output;
    }
    public function searchByInput(Request $request)
    {
        $query = $request->get('query');

        $materials = Materials::where('name', 'like', '%'.$query.'%')
                                ->orWhere('authors', 'like', '%'.$query.'%')
                                ->orWhereHas('category', function(Builder $builder) use ($query){
                                    $builder->where('name','like', '%'.$query.'%');
                                })
                                ->get();

        if($materials->isEmpty()){
            return response('Нет данных!!!', 422);
        }

        $output = Materials::searchResult($materials);

        return $output;
    }
}
