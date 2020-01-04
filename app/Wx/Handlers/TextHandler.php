<?php

namespace App\Wx\Handlers;

use App\Article;

class TextHandler
{
    protected $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function handle()
    {
        $blogs = Article::orderBy('id', 'desc')
            ->limit(5)
            ->select('id', 'title')
            ->get();
        $arr = $blogs->map(function ($blog) {
            return "<a href='/hot-blogs/$blog->id'>$blog->title</a>";
        });
        $str = join('\n', $arr);
        return $str;
    }
}
