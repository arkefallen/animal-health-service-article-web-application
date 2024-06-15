<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $categories = ArticleCategory::all();
        $userEmail = Auth::user()->email;

        return view('layouts/category/category', compact('categories','userEmail'));
    }
    
    public function create()
    {
        $categories = ArticleCategory::all();

        return view('layouts/category/category', compact('categories'));
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

    public function update(Request $request, $category_id) {
        DB::beginTransaction();

        try {
            $category = ArticleCategory::find($category_id);
            $category->update($request->all());
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('category')->with('failed_update_category', $th->getMessage());
        }

        DB::commit();

        return redirect('category')->with('success_update_category', 'Berhasil ubah kategori');
    }

    public function destroy($category_id) {
        DB::beginTransaction();

        try {
            ArticleCategory::destroy($category_id);
        } catch (\Throwable $th) {
            return redirect('category')->with('failed_delete_category', $th->getMessage());
        }

        DB::commit();

        return redirect('category')->with('success_delete_category', 'Berhasil menghapus kategori');
    }
}
