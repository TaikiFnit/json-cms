<?php

/**
* deleteModel
*/
class deleteNewsModel extends appModel
{
	private $sysRoot;
	private $dbh;
	private $id;
	private $putData;

	function __construct($s, $i)
	{
		$this->sysRoot = $s;
		$this->id = $i;
		$this->dbh = $this->connectDB();
	}

	function run() {

		$sql = 'delete from news where news_id = :id';

		$values = array(':id'=>$this->id);

		return array('result'=>$this->insert($this->dbh, $sql, $values));
	}
}