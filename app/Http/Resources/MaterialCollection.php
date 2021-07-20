<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MaterialCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\MaterialResource';

    public function toArray($request)
    {
        return [
            'data' => $this->collection->sortBy('created_at')
        ];
    }
}
