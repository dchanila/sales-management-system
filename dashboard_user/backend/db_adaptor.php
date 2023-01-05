<?php 

interface DB_Interface{
	public function insert($sql);
	public function fetch($sql);
}

class DB_Interface_Adapter implements DB_Interface{
	private $source;

	function __construct(){
		$host="localhost"; $user="root";
		$pwd = ""; $db ="wendeline";
		$this->source = new mysqli($host,$user,$pwd,$db);
 
	}
	public function insert($sql){
		$this->source->query($sql);
	}
	public function fetch($sql){
	     return $this->source->query($sql);
	}
}

?>