<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'router' => $this->name,
            'icons' => $this->icons,
            'sort' => $this->sort,
            'mark' => $this->mark,
            'type' => $this->type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'descendants_count' => $this->descendants_count,
            'hasChildren' => $this->descendants_count? true : false,
        ];
    }
}
