<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCategoryCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'article_categories';

    public function toArray(Request $request)
    {
        return $this->collection;
    }

    public function with(Request $request)
    {
        return [
            'status' => true,
            'message' => 'Success'
        ];
    }
}
