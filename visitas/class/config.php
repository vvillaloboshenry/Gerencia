<?php

class Connection{
	
	//variables para los datos de la base de datos
	public $server;
	public $userdb;
	public $passdb;
	public $dbname;
	
	public function __construct(){
		
		//Iniciar las variables con los datos de la base de datos
		$this->server = 'localhost';
		$this->userdb = 'root';
		$this->passdb = '';
		$this->dbname = 'gerencia';
		
	}
	
	public function get_connected(){
		
		//Para conectarnos a MySQL
		$con = mysql_connect($this->server, $this->userdb, $this->passdb);
		//Nos conectamos a la base de datos que vamos a usar
		mysql_select_db($this->dbname, $con);
		
	}
	
}

?>