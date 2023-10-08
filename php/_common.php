<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
/*
 // 关闭错误报告
 error_reporting(0);

 // 报告 runtime 错误
 error_reporting(E_ERROR | E_WARNING | E_PARSE);

 // 报告所有错误
 error_reporting(E_ALL);

 // 等同 error_reporting(E_ALL);
 ini_set("error_reporting", E_ALL);

 // 报告 E_NOTICE 之外的所有错误
 error_reporting(E_ALL & ~E_NOTICE);
*/


if ( !defined('IN_SITE') )
{
	die("Hacking attempt");
}

require_once($root_path.'includes/config.php');	//数据库信息
require_once($root_path.'includes/functions.php');	//供调用的函数库
require_once($root_path.'includes/db7.php');	//引入数据库类


require_once $root_path ."includes/smarty3/Smarty.class.php";
require_once($root_path.'includes/mySmarty.php');		//MySmarty由Smarty继承而来
require_once($root_path.'includes/Ctrl.php');           //所有Ctrl类的父类
require_once($root_path.'includes/core.php');           //MVC核心类


