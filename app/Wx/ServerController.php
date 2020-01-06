<?php

namespace App\Wx;

use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use App\Wx\Handlers;

class ServerController extends Controller
{
    public function index()
    {
        $config = [
            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID'),
            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET'),
            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN'),
            'response_type' => 'array',
            //...
        ];

        $app = Factory::officialAccount($config);
        // $app->menu->delete();
        $app->menu->create($this->menu());

        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return (new Handlers\EventHandler($message))->handle();
                    break;
                case 'text':
                    return Gzh::userInfo();
                    // return '收到文字消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                    // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

        return $app->server->serve();
    }


    protected function menu()
    {
        return [
            [
                "type" => "click",
                "name" => "文章推荐",
                "key" => "articles"
            ],
            [
                "type" => "click",
                "name" => "个人中心",
                "key" => "me"
            ]
        ];
    }
}
