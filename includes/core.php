<?php

class core{
    
    public $controllerName;
    public $actionName;
    public $param; 
    public $ctrlpath;
        
    public function MVC($url,$root_path){
        
        // 清除?之后的内容
        $position = strpos($url, '?');
        $url = $position === false ? $url : substr($url, 0, $position);

        // 删除前后的“/”
        $url = trim($url, '/');

            //echo "删除？之后部分以及前后/之后，URL=".$url."<br>";

        
        if ($url) {
            // 使用“/”分割字符串，并保存在数组中
            $urlArray = explode('/', $url);
            // 删除空的数组元素

            //var_dump($urlArray);
            $urlArray = array_filter($urlArray,'filter_function'); //filter_function写在function.php中
            //var_dump($urlArray);

            // 获取控制器名
            if(empty($urlArray[0])){
                $this->controllerName='err';
            }else{
                $this->controllerName = $urlArray[0];    //controller名称首字母大写 ucfirst($urlArray[0])
            }

            // 获取动作名
            array_shift($urlArray);
            if(empty($urlArray[0])){
                $this->actionName='err';
            }else{
                $this->actionName = $urlArray ? $urlArray[0] : $this->actionName;
            }

            // 获取URL参数
            array_shift($urlArray);

            if(empty($urlArray[0])){
                $this->param="";
            }else{
                $this->param = $urlArray ? $urlArray : array();
            }
            
            $this->ctrlpath = $root_path."controllers/".$this->controllerName.'Ctrl.php';
            if(!file_exists($this->ctrlpath)){    //查询ctrl控制器文件是否存在，如果所请求的ctrl不存在，则默认调用err控制器；
                $this->controllerName='err';
                $this->actionName='default';
                //$this->param="";

            }//这里只管ctrl控制器文件是否存在，不管控制器下的动作是否存在(交由index.php处理)。

            


        }else{
            $this->controllerName='index';  //如果什么也没输入，就到这里
            $this->actionName='welcome';
            //$this->param="";

        }


        
        
    }//functin mvc



    
    
    
}// class core 
