<?php

namespace App\Wx;

use EasyWeChat\Factory;

class Gzh
{
    public static function app()
    {
        $config = [
            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID'),
            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET'),
            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN'),
            'response_type' => 'array',
            //...
        ];
        return Factory::officialAccount($config);
    }

    public static function userInfo()
    {
        $user = session('wechat.oauth_user.default'); // 拿到授权用户资料
        return $user['id'] . '22222';
        $userInfo = self::app()->user->get($user['id']);
        dd($userInfo);
    }
}
