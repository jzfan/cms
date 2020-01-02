<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        // $Parsedown = new \Parsedown();

        // $article->conent = $Parsedown->text($article->content);

        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        Article::create($data);
        flash()->success('操作成功');
        return back();
        // return redirect()->route('articles.index');
    }

    public function update(Article $article)
    {
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        $article->update($data);
        flash()->success('操作成功');
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        if ($article->delete()) {
            return 'ok';
        }
        flash()->success('操作成功');
    }
}
