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
			//_$sql = 'select * from news left join category on news.category_id = category.category_id order by created desc';
			$sql = 'select * from news order by created desc';
			return $this->fetch($this->dbh, $sql, array());
		}
		else if(ctype_digit($this->id)){
			//$sql = 'select * left join category on news.category_id = category.category_id from news where id = :id';
			$sql = 'select * from news where news_id = :id';
			$values = array(':id'=> $this->id);
			$results = $this->fetch($this->dbh, $sql, $values);

			$response = $results[0];

			// 画像データを抽出
			$imageSql = 'select * from images where news_id = :id';
			$results2 = $this->fetch($this->dbh, $imageSql, $values);

			$response['images_num'] = count($results2);
			$response['images'] = $results2;

			for($i = 0; $i < $response['images_num']; $i++) {
				$response['images'][$i]['image_name'] = $response['images'][$i]['image_src'];
				$response['images'][$i]['image_src'] = 'http://' . $_SERVER["SERVER_NAME"] . NEWS_IMAGE_PATH . $response['images'][$i]['image_src'];
			}

			return $response;
		}
	}
}