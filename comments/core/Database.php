<?php 

class Database{

	//properties
	private $server;
	private $database;
	private $user;
	private $password;

	protected function connect(){
		$this->server="tv1.rw";
		$this->user="api_access";
		$this->password="Stuxnet7268";
		$this->database="Web";

		$conn=new mysqli($this->server,$this->user,$this->password,$this->database);

		return $conn;
	}
}
?>