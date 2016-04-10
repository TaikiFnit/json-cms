<?php

/**
* truncateModel
*/
class truncateModel extends appModel
{
	private $dbh;

	function __construct() {
		$this->dbh = $this->connectDB();
	}

	function run() {

		$sql = 'truncate table news';	

		return array('result'=> $this->insert($this->dbh, $sql, array()));
	}
}