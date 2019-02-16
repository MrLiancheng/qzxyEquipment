<?php

namespace app\yiban\controller;

use think\Controller;

class Index extends Controller
{

    public function login()
    {
        //选择设备借还界面

        return view();
    }

    public function jhym()
    {
        import('classes.yb-globals',EXTEND_PATH,'.inc.php');//tp5使用import引入文件，SDK在extend根目录下，自动加载

        //配置文件
        require_once 'config.php';
        //初始化
        $api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
        $au = $api->getAuthorize();

        //网站接入获取access_token，未授权则跳转至授权页面
        $info = $au->getToken();
        if (!$info['status']) { //授权失败
            echo $info['msg'];
            die;
        }
        $token = $info['token']; //网站接入获取的token

        return view('jhym');
    }

}
