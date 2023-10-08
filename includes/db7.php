<?php
if(!defined('IN_SITE'))
{
	die("Hacking attempt");
}
class mydb {
	public $link;
	public $res;
	public $row_array;
	public $EOR;
	public $NOR;
    public $ERRINFO;
    public $ERRNO;
	public $lastID;
	function __construct() {
		$this->EOF=false;
	}
	
	function dbconn($h,$u,$p){
		$this->link = new mysqli($h,$u,$p);
		if (mysqli_connect_errno()) { $this->ERRINFO=mysqli_connect_error($this->link);return FALSE;}
		mysqli_query($this->link,"set character set 'utf8'");//read database 
		mysqli_query($this->link,"set names 'utf8'");//write database 

	}
	
	function dbdisconn(){
		mysqli_close($this->link);
	}
    
    
    
    
	
	function dbselect($d) {
		if(!mysqli_select_db($this->link,$d) ){
            return FALSE;
        }else{
            return TRUE;
        }
	}
	
	function dbquery($q){
		$this->res=mysqli_query($this->link,$q);
        $this->ERRNO=mysqli_errno($this->link);
		if(!$this->res){
            $this->ERRINFO=mysqli_error($this->link);
            
            return FALSE;
        }else{
            $this->NOR=mysqli_num_rows($this->res);
		    $this->row_array=mysqli_fetch_array($this->res,MYSQLI_BOTH);//MYSQL_ASSOC，MYSQL_NUM 和 MYSQL_BOTH
		    if(!$this->row_array){$this->EOR=true;}else{$this->EOR=false;}
            
            return TRUE;
        }

	}
	
	function nextres() {
		$this->row_array=mysqli_fetch_array($this->res,MYSQLI_BOTH);
        $this->ERRNO=mysqli_errno($this->link);
		if($this->row_array==NULL){$this->EOR=true;}else{$this->EOR=false;}
	}
	
	function dbinsert($q){
		$this->res=mysqli_query($this->link,$q);
        $this->ERRNO=mysqli_errno($this->link);
		if(!$this->res){
            $this->ERRINFO=mysqli_error($this->link);
            
            return FALSE;
        }else{
            $this->lastID=mysqli_insert_id($this->link);
		    $this->NOR=mysqli_affected_rows($this->link);
            return TRUE;
        }
		
	}
	
	function dbdo($q){
		$this->res=mysqli_query($this->link,$q);
        $this->ERRNO=mysqli_errno($this->link);
		if(!$this->res){
            $this->ERRINFO=mysqli_error($this->link);
            
            return FALSE;
        }else{
            return TRUE;
        }
		
	}
	
}
?>