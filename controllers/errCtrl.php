<?php
//namespace controllers;

 
class err extends Ctrl
{
    private $root_path='./';
   // public $mySmarty;
    private $showtext;
    
    public function __construct()
    {
        //构造函数。
        


   }
    
    
    
    
    
    
    
    public function default($param)
    {
        //$this->showtext="Hello. <br/>You see this page is because you didn't input correct Url.<br>";

        $mySmarty=new mySmarty();
        //$mySmarty->assign('text',$this->showtext);
        $mySmarty->display($this->root_path.'templates/err.html');


    }
    



}