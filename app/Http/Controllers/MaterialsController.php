<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materials;
use App\Types;
use App\Categories;
use App\Tags;
use App\Links;
use Illuminate\Validation\Rule;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Materials::orderBy('created_at', 'DESC')->get();

        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluck('name','id')->all();

        $types = Types::pluck('name','id')->all();

        return view('materials.create', compact('categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string|min:3|max:255|unique:materials',
            'id_category'   =>  'required',
            'id_type' =>  'required',
            'authors' => 'required',
            'description' => 'string|nullable'
        ]);
        Materials::create($request->all());

        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Materials::find($id);

        $selected = $material->tags;

        $tags = Tags::pluck('name','id')->all();

        $filtered = array_diff_assoc($tags, $selected->pluck('name','id')->all());

        $links = $material->links;

        return view('materials.show', compact('material','filtered','selected','links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Materials::find($id);

        $categories = Categories::pluck('name','id')->all();

        $types = Types::pluck('name','id')->all();

        return view('materials.edit', compact('material','categories','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required','min:3','max:255','string', Rule::unique('materials')->ignore($id)],
            'id_category'   =>  'required',
            'id_type' =>  'required',
            'authors' => 'required',
            'description' => 'string|nullable'
        ]);
        Materials::find($id)->update($request->all());

        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materials::find($id)->delete();

        return redirect()->back();
    }
    public function addTag(Request $request, $id)
    {
        $material = Materials::find($id);

        $material->tags()->attach($request->get('tag_id'));

        return redirect()->back(); 
    }
    public function removeTag($id, $tag_id)
    {
        $material = Materials::find($id);

        $material->tags()->detach($tag_id);

        return redirect()->back(); 
    }
    public function tags($id)
    {
        $tag = Tags::find($id);

        $materials = $tag->materials;

        return view('materials.tags', compact('materials','tag'));
    }
    public function linksCreate(Request $request, $id)
    {
        $this->validate($request, [
            'description' =>'string|nullable',
            'link' => 'required|url|unique:links'
        ]);
        $fields['description'] = $request->get('description');
        $fields['link'] = $request->get('link');
        $fields['id_material'] = $id;

        Links::create($fields);

        return redirect()->back();
    }
    public function linksDestroy($id)
    {
        Links::find($id)->delete();

        return redirect()->back();
    }
}
