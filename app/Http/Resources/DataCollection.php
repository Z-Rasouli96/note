<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DataCollection extends ResourceCollection
{
    /**
     * The resource's additional data.
     *
     * @var array
     */
    public $additional = [
        'meta' => [
            'version' => '1.0',
            'author' => 'Your Name',
        ],
    ];

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
