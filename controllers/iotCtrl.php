<?php
//namespace controllers;

 
class iot extends Ctrl
{
    private $root_path='./';
    private $showtext;
    //private $iotlist;
    
    public function __construct()
    {
        //重载空构造函数，暂时允许不进行登录状态检查就能够控制。
        
    }


    
    
    public function list_all($param)
    {
        $this->showtext="<br>";
        //$this->getdbdata();

        $mySmarty=new mySmarty();

        //var_dump($this->iotlist);

        //$mySmarty->assign('iotlist',$this->iotlist);
        $mySmarty->display($this->root_path.'templates/iot.html');  //直接输出页面。动态内容通过AJAX实现。


    }
    
    public function list_all_iot($param)    //ajax
    {

        $db=new mydb();
        $db->dbconn(DB_HOST,DB_USER,DB_PASSWORD);
        $db->dbselect(DB_DB);


        $query="SELECT * FROM devices";
        $db->dbquery($query);

        $i=0;
		while (!$db->EOR) {
			$this->iotlist[$i]=$db->row_array;
			$db->nextres();
			$i++;
		}

		if($db->NOR<=0){	$this->iotlist=0;	}

        $db->dbdisconn();
        unset($db); 

        $mySmarty=new mySmarty();
        $mySmarty->assign('iotlist',$this->iotlist);
        echo $mySmarty->fetch($this->root_path.'templates/ajax_iot_list.html');

        
        
    }




    public function update_iot_device($param)   //ajax  param = id / status  
    {
        
        $db=new mydb();
        $db->dbconn(DB_HOST,DB_USER,DB_PASSWORD);
        $db->dbselect(DB_DB);

        $query="UPDATE devices SET device_status='".$param[1]."' WHERE id='".$param[0]."'";
        $db->dbdo($query);

        $db->dbdisconn();
        unset($db); 

        $this->list_all_iot(null);



    }


}