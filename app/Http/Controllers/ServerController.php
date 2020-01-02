<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;

class ServerController extends Controller
{
    public function index()
    {
        
        $config = [
            'app_id' => 'wx73e30f63885f1929',
            'secret' => 'e65f54069a88a159b5f4f2ca28c77549',
            'token' => '0e3b26b0dc60e8424821357bc8a8ba59',
            'response_type' => 'array',
            //...
        ];
        
        $app = Factory::officialAccount($config);
        // $app->menu->delete();
        $app->menu->create($this->menu());
        
        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return '收到文字消息';
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
                "type" => "view",
                "name" => "文章推荐",
                "url"  => "/wx/blogs-today"
            ],
            [
                "type" => "click",
                "name" => "文章推荐",
                "key"  => "V1002_TODAY_BLOG"
            ],
            // [
            //     "name"       => "菜单",
            //     "sub_button" => [
            //         [
            //             "type" => "view",
            //             "name" => "搜索",
            //             "url"  => "http://www.soso.com/"
            //         ],
            //         [
            //             "type" => "view",
            //             "name" => "视频",
            //             "url"  => "http://v.qq.com/"
            //         ],
            //         [
            //             "type" => "click",
            //             "name" => "赞一下我们",
            //             "key" => "V1001_GOOD"
            //         ],
            //     ],
            // ],
        ];
    }


    public function blogsToday()
    {
        return 1234;
    }
}
