<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollectionResource;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ApiArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $articles = Article::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ], $th->getCode());
        }

        return new ArticleCollectionResource($articles);
    }

    public function show($article_id)
    {
        try {
            $article = Article::find($article_id);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ], $th->getCode());
        }

        return new ArticleResource($article);
    }
}
