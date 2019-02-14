<?php
$token = isset($token) ? $token : $_GET['token'];

/**
 * 包含SDK
 */
require("../classes/yb-globals.inc.php");

// 配置文件
require_once 'config.php';

//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);

?>

<html>
<body>
    <div><?php var_dump($api->request('user/me'))?></div>
</body>
</html>