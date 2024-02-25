<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();

        return view('article', compact('articles'));
    }

    public function create() {
        return view('create');
    }

    public function edit($article_id) {
        $article = Article::find($article_id);

        return view('edit', compact('article'));
    }

    public function show($id) {
        $article = Article::find($id);

        return view('detail', compact('article'));
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

    public function delete($article_id) {
        DB::beginTransaction();
        try {
            Article::destroy($article_id);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/')->with('failed_delete',$th->getMessage());
        }

        DB::commit();
    
        return redirect('/')->with('success_delete','Artikel berhasil dihapus');
    }
}
