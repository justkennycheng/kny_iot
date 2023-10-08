<?php



    class Ctrl      //所有controller的父类
    {
        public function __construct()
        {
            //构造函数。检测登录状态
            check_login_status();


        }
        
        function __call($name, $arguments)
        {
            exit("function ".$name." doesn't exist.");
        }
        
        public function none($param)
        {
            exit("No Function or function doesn't exist(none).");

        }
    }
