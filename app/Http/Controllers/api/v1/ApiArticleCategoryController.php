<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCategoryCollectionResource;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ApiArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();

        return new ArticleCategoryCollectionResource($articleCategories);
    }
}
