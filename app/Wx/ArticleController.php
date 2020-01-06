<?php

namespace App\Wx;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('wx.article', \compact('article'));
    }
}
