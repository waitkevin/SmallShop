<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class CommonCollection
 * @package App\Http\Resources
 */
class CommonCollection extends ResourceCollection
{
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
            'page' => [
                'size' => $this->count(),
                'page' => $this->currentPage(),
                'total' => $this->total(),
            ]
        ];
    }
}
