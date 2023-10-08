<?php
//namespace controllers;

 
class login extends Ctrl
{
    private $root_path='./';
   // public $mySmarty;
    //private $showtext;
    
    public function __construct()
    {
        //重载空构造函数，不进行登录状态检查。
        
    }
    
    
    
    public function showlogin($param)
    {
        if( false !== strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'MicroMessenger' ) ){
            echo "请点击右上角，选择在浏览器中打开";
            die();


        }
        
        
        //$this->showtext="欢迎。这里是Index控制类的welcome函数。<br>";
        $mySmarty=new mySmarty();
        //$mySmarty->assign('text',$this->showtext);
        $mySmarty->display($this->root_path.'templates/login.html');


    }
    

    public function dologin($param)   //ajax
    {
        //
        $db=new mydb();
        $db->dbconn(DB_HOST,DB_USER,DB_PASSWORD);
        $db->dbselect(DB_DB);

        $query="SELECT * FROM users WHERE username='".$param[0]."' AND password='".$param[1]."'";
		$db->dbquery($query);
		if($db->NOR>0){
            echo "ok";
            $_SESSION['id']=$param[0];
            $_SESSION['username']=$db->row_array[1];
            $_SESSION['usertype']=$db->row_array[3];
            //echo("<script>window.location.href='http://wh-nsc6uejjkue7ims3llv.my3w.com/';</script>");

        }else{
            echo 0;	
        }

        $db->dbdisconn();
        unset($db); 

    }


    public function logout($param)   //ajax
    {
        //

        session_destroy();
        
        echo("<script>window.location.href='http://wh-nsc6uejjkue7ims3llv.my3w.com/';</script>");
        //header('location: http://wh-nsc6uejjkue7ims3llv.my3w.com/');
        die();

    }





}