<?php

class Database{
	
	public $result;
	
	public function __construct(){ }
	
	public function select($query){
		return $this->result = mysql_query($query);
	}
	
}

?>