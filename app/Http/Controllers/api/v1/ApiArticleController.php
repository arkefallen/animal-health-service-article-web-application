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
        $articles = Article::all();

        return new ArticleCollectionResource($articles);
    }

    public function show($article_id)
    {
        $article = Article::find($article_id);

        return new ArticleResource($article);
    }
}
