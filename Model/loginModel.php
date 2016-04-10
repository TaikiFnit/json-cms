<?php

/**
* loginModel
*/
class loginModel extends appModel
{
	private $sysRoot;
	private $dbh;
	private $postData;

	function __construct($s, $p)
	{
		$this->sysRoot = $s;
		$this->postData = $p;
		$this->dbh = $this->connectDB();
	}

	function run() {

		/*
		$sql = 'select * from users where name = :name and password = :password';

		$values = array(':name'=> $this->postData['name'], ':password'=> sha1($this->postData['password']));

		return $this->fetch($this->dbh, $sql, $values);
		*/

		require_once $this->sysRoot . '/users.php';

		for($i = 0; $i < count($users); $i++) {
			if($users[$i]['name'] == $this->postData['name'] && $users[$i]['password'] == $this->postData['password']) {
				return $users[$i];
			}
		}

		return array();
	}
}