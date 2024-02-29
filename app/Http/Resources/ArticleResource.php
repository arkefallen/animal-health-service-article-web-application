<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'article';

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'content' => $this->content,
            'author' => $this->author,
            'date' => $this->date,
            'title' => $this->title
        ];
    }

    public function with(Request $request)
    {
        return [
            'status' => true,
            'message' => 'Success'
        ];
    }
}
