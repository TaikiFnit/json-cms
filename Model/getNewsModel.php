<?php

/**
* getNewsModel
*/
class getNewsModel extends appModel
{
	private $dbh;
	private $id;

	function __construct($s, $i)
	{
		$this->id = $i;
		$this->dbh = $this->connectDB();
	}

	function run() {

		if($this->id == '*') {
			$sql = 'select * from news order by created desc';
			return $this->fetch($this->dbh, $sql, array());
		}
		else {
			$sql = 'select * from news where id = :id';
			$values = array(':id'=> $this->id);
			$results = $this->fetch($this->dbh, $sql, $values);
			return $results[0];
		}
	}
}