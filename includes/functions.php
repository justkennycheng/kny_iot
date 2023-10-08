<?php

function check_login_status(){
	//
	if(!isset($_SESSION['id'])){
		//
		echo("Please relogin");


        echo("<script>window.location.href='http://wh-nsc6uejjkue7ims3llv.my3w.com/err/default/';</script>");
        die();
        
	}else{
		//echo("what");
        return true;
	}

}



function filter_function($arr)  //core.php中供array_filter使用的回调函数
{
    if ($arr == '' || $arr == null){
        return false;
    }
    return true;

}



?>