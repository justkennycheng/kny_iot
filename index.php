<?php
session_start();
define('IN_SITE', true);
$root_path = './';
include_once($root_path . 'php/_common.php');

$url = $_SERVER['REQUEST_URI'];

$core=new core(); //调用核心MVC类
$core->MVC($url,$root_path);    //运行core类中的MVC方法,获取控制器名$core->controllerName,动作名$core->actionName,以及参数$core->param. 
                                //如果什么也没输入，就将控制器名设为index，动作名设为welcome；如果输入的控制器名找不到，就调用err控制器的default方法。

/*
echo "controllerName=".$core->controllerName."<br>";
echo "actionName=".$core->actionName."<br>param=";
var_dump($core->param);
echo "<br>GET=";
var_dump($_GET);
echo "<br>=====================controller输出结果====================<br>";
*/

require_once($root_path."controllers/".$core->controllerName.'Ctrl.php');    // 根据控制器引入控制器

$dispatch = new $core->controllerName();    //名实例化控制器
$actionName=$core->actionName;  //得到方法名
if(!in_array($actionName,get_class_methods($dispatch))){
    $actionName = "none";                           //如果在控制器中没有找到请求的方法，则将方法设置为none. none()方法在Ctrl父类中定义。
    //echo "无法方法，已替换为none";
}
$dispatch->$actionName($core->param);       //以param参数运行controllerName控制器的actionName方法！！！这句是最终目的



