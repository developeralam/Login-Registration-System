<?php

/**
 * 
 */
class Database
{
	private $hostdb = "localhost";
	private $userdb = "root";
	private $passdb = "";
	private $namedb = "log_reg";
	public $pdo;
	
	function __construct()
	{
		if (!isset($this->pdo)) {
			try{
			$link = new pdo("mysql:host=".$this->hostdb.";dbname=".$this->namedb, $this->userdb, $this->passdb);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$link->exec("set CHARACTER SET utf8");
			$this->pdo = $link;
			}catch(PDOException $e){
				echo "Database Connection Failed ".$e->getMessage();
				die();
			}
		}
	}
}