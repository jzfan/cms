<?php

namespace App\Wx\Handlers;

use App\User;

class EventHandler
{
    protected $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function handle()
    {
        if ($this->msg['Event'] === 'subscribe') {
            return $this->onSubscribe();
        }
        if ($this->msg['Event'] === 'CLICK' && $this->msg['EventKey'] === 'articles') {
            return $this->onClickArticles();
        }
        return 'event handled';
    }

    public function onSubscribe()
    {
        $user = User::firstOrCreate([
            'openid' => $this->msg['FromUserName']
        ], [
            'name' => '微信用户' . substr($this->msg['FromUserName'], 0, 5),
        ]);
        return $user->name;
    }

    public function onClickArticles()
    {
        $articles = \App\Article::orderBy('id', 'desc')
            ->limit(10)
            ->get();
        $str = '';
        foreach ($articles as $a) {
            $str .= "<a href='http://card.aa086.com/wx/articles/$a->id'>$a->title</a>\n\n";
        }
        return $str;
    }
}
