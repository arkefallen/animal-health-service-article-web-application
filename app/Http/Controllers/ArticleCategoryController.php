<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleCategoryController extends Controller
{
    public function create()
    {
        $categories = ArticleCategory::all();

        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string'
        ]);

        DB::beginTransaction();

        try {
            $category = new ArticleCategory;

            $category->category_name = $request->category_name;

            $category->save();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/category')->with('failed_create_category', $th->getMessage());
        }

        DB::commit();

        return redirect('/category')->with('success_create_category', 'Berhasil tambah kategori');
    }

    public function destroy($category_id) {
        DB::beginTransaction();

        try {
            ArticleCategory::destroy($category_id);
        } catch (\Throwable $th) {
            return redirect('/category')->with('failed_delete_category', $th->getMessage());
        }

        DB::commit();

        return redirect('/category')->with('success_delete_category', 'Berhasil menghapus kategori');
    }
}
