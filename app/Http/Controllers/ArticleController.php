<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $articles = Article::all();
        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;

        return view('layouts/article/article', compact('articles','userEmail', 'userName'));
    }

    public function create() {
        $categories = ArticleCategory::all();

        return view('layouts/article/create', compact('categories'));
    }

    public function edit($article_id) {
        $article = Article::find($article_id);
        $categories = ArticleCategory::all();

        return view('layouts/article/edit', compact('article', 'categories'));
    }

    public function show($id) {
        $article = Article::find($id);

        return view('layouts/article/detail', compact('article'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'author' => 'required|string'
        ]);

        try {
            $article = new Article;
            $article->title = $request->title;
            $article->date = $request->date;
            $article->author = $request->author;
            $article->content = $request->content;
            $article->category_id = $request->category_id;

            $article->save();
        } catch (\Throwable $th) {
            return redirect('/create')->with('failed_store',$th->getMessage());
        }
        
        return redirect('/article')->with('success_store','Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, $article_id) {
        try {
            $article = Article::find($article_id);
            $article->update($request->all());
        } catch (\Throwable $th) {
            return redirect('article.edit')->with('failed_update',$th->getMessage());
        }
    
        return redirect('/article')->with('success_update','Artikel berhasil diperbarui');
    }

    public function delete($article_id) {
        try {
            Article::destroy($article_id);
        } catch (\Throwable $th) {
            return redirect('/article')->with('failed_delete',$th->getMessage());
        }

        return redirect('/article')->with('success_delete','Artikel berhasil dihapus');
    }
}
