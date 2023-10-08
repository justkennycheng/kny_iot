<?php
//namespace controllers;

 
class iotstatus extends Ctrl
{
    private $root_path='./';
    private $showtext;
    //private $iotlist;
    
    public function __construct()
    {
        //重载空构造函数，由于此页是IOT设备直接访问读取状态，不进行登录状态检查。
        
    }
    
    public function check_iot_status($id)   //供ESP等IOT设备查询控制指令，后控制设备
    {
        if(isset($id[0])){
            $db=new mydb();
            $db->dbconn(DB_HOST,DB_USER,DB_PASSWORD);
            $db->dbselect(DB_DB);
            
            
            //
            $query="SELECT * FROM devices WHERE id='".$id[0]."'";
            $db->dbquery($query);

            if($db->NOR<=0){
                echo "none";	
            }else{
                echo $db->row_array[3];
            }

            $db->dbdisconn();
            unset($db); 
        }



    }


}