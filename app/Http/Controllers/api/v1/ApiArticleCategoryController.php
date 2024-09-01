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
        try {
            $articleCategories = ArticleCategory::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ], $th->getCode());
        }

        return new ArticleCategoryCollectionResource($articleCategories);
    }
}
