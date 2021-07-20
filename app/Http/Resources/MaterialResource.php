<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'authors' => $this->authors,
            'type' => $this->type->name,
            'category' => $this->category->name
        ];
    }
}
