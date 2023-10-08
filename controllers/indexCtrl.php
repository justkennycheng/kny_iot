<?php
//namespace controllers;

 
class index extends Ctrl
{
    private $root_path='./';
   // public $mySmarty;
    private $showtext;
    
    public function welcome($param)
    {
        //$this->showtext="欢迎。这里是Index控制类的welcome函数。<br>";
        $this->op();

        $mySmarty=new mySmarty();
        //$mySmarty->assign('text',$this->showtext);
        $mySmarty->display($this->root_path.'templates/index.html');


    }
    



}