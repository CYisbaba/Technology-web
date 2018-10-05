<?php

/**
 * 数据库连接初始化
 * @param $host
 * @param $username
 * @param $password
 * @param $dbName
 * @return bool|resource
 */
function mysqlInit($host, $username, $password, $dbName)
{
    $con = mysql_connect($host, $username, $password);
    if(!$con)
    {
        return false;
    }

    mysql_select_db($dbName);
    //设置字符集
    mysql_set_charset('utf8');

    return $con;

}

/**
 * 密码加密
 * @param $password
 * @return bool|string
 */
function createPassword($password)
{
    if(!$password)
    {
        return false;
    }

    return md5(md5($password) . 'IMOOC');
}


/**
 * 消息提示
 * @param int $type 1:成功 2:失败
 * @param null $msg
 * @param null $url
 */
function msg($type, $msg = null, $url = null)
{
    $toUrl = "Location:msg.php?type={$type}";
    //当msg为空时 url不写入
    $toUrl .= $msg ? "&msg={$msg}" : '';
    //当url为空 toUrl不写入
    $toUrl .= $url ? "&url={$url}" : '';
    header($toUrl);
    exit;
}


?>