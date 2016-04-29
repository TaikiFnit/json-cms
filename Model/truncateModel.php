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

		$result = $this->insert($this->dbh, $sql, array());

		// 全記事の削除に成功しているのであれば、すべての画像も同じく削除する
		if($result) {
			$images = $this->ftpFileList(REMOTE_FILE);

			for($i = 0; $i < count($images); $i++) {
				$str = substr($images[$i], -1);
				if($str === '.' || $str === '..') {
					continue;	
				}

				$path = $images[$i];
				$this->ftpDelete($path);
			}
		}

		return array('result'=> $result);
	}
}