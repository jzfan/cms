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
    }

    public function onSubscribe()
    {
        $user = User::firstOrCreate([
            'openid' => $this->msg['FromUserName']
        ], [
            'name' => '微信用户' . substr($this->msg['FromUserName'], 0 , 5),
        ]);
        return $user->name;
    }

}
