<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NodeCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = NodeResource::class;
    

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'list' => $this->collection,
        ];
    }
}
