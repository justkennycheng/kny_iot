<?php
if ( !defined('IN_SITE') )
{
	die("Hacking attempt from website....");
}
	
	
    class mySmarty extends Smarty
    {
        public function __construct(array $options = array())
        {
            parent::__construct($options);
            $this->left_delimiter = "{{";
            $this->right_delimiter = "}}";
            //$this->force_compile = true; //强迫编译##开发期间true

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //一般不建议全站开启缓存,哪个页面需要就开启哪个。所以,不要把缓存配置写在公共配置文件里
            $this->caching = false;		//false表示不缓存#开发期间false开
            //$smarty->cache_lifetime = 120;   //定义模板缓存文件的有效时间（按秒）;当缓存过期了，该缓存将被重新生成。使用$cache_lifetime必须先开启$caching
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            $this->debugging = false;    //调试控制台的开关设置//是否开启debug调试
            $this->auto_literal = false;    //只要Smarty定界符标签‘｛’和‘｝’内侧包含空格，那么模板将忽略定界符里面内容的解析。可以将$auto_literal变量设置为false取消上述规则

            $this->setTemplateDir("./" . 'templates/');

            $this->setCompileDir("./"  . 'templates/templates_c/');
            $this->setConfigDir("./"  . 'templates/configs/');
            $this->setCacheDir("./"  . 'templates/cache/');
        }
    }
         


//中文

?>
