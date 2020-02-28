<?php

namespace App\Http\Controllers;

use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use Modules\Wx\Entities\WxConfig;

class WechatController extends Controller
{
    public function handler(WxConfig $wxConfig) {
        $config = array_merge(include (base_path('config/'.'hd_wechat.php')), $wxConfig->pluck('value', 'name')->toArray());
        dd($config);
        WeChat::config($config);
        (new WeChat)->valid();
    }
}
