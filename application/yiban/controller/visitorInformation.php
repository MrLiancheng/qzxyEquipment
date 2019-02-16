<?php
$token = isset($token) ? $token : $_GET['token'];
header('Content-Type:text/html;charset=UTF-8');
//$backValue=$_POST['trans_data'];
/**
 * 包含SDK
 */
require("../../classes/yb-globals.inc.php");

// 配置文件
require_once 'config.php';

//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);

$content=$api->request('user/me');
var_dump($content);
// if(isset($backValue)){
//     $cont=json_encode($content,JSON_UNESCAPED_UNICODE);//转移成json,中文设置不自动转义
//     echo $cont;
//     //var_dump($content);//打印数组
// }

?>