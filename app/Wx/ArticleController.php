<?php

namespace App\Wx;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')
            ->limit(10)
            ->get();
        $arr = $articles->map(function ($blog) {
            return "<a href='/hot-blogs/$blog->id'>$blog->title</a>";
        });
        $str = join('\\n', $arr);
        return $str;
    }

    public function show(Article $article)
    {
        return view('wx.article', \compact('article'));
    }
}
