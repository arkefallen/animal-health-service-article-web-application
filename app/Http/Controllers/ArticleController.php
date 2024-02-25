<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function showAllArticle() {
        $articles = Article::all();

        return view('article', compact('articles'));
    }

    public function addNewArticle() {
        return view('create');
    }

    public function showDetailArticle($article_id) {
        $article = Article::find($article_id);

        return view('detail', compact('article'));
    }

    public function modifyArticle() {
        return view('editArticle');
    }

    public function getAllArticle() {
        return Article::all();
    }

    public function show($id) {
        return Article::find($id);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required',
            'category' => 'required',
            'date' => 'required',
            'author' => 'required|string'
        ]);

        DB::beginTransaction();

        try {
            $article = new Article;
            $article->title = $request->title;
            $article->date = $request->date;
            $article->author = $request->author;
            $article->content = $request->content;
            $article->category = $request->category;

            $article->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/create')->with('failed_store',$th->getMessage());
        }

        DB::commit();
        
        return redirect('/')->with('success_store','Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, Article $article) {
        $article->update($request->all());
    
        return response()->json($article, 200);
    }

    public function delete(Article $article) {
        $article->delete();

        return response()->json(null, 204);
    }
}
