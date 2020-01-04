<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $arr = $articles->map(function ($blog) {
            return "<a href='/hot-blogs/$blog->id'>$blog->title</a>";
        });
        $str = join('\n', $arr);
        return $str;
    }

    public function show(Article $article)
    {
        return $article->content;
        return view('wx.article.show', \compact('article'));
    }
}
