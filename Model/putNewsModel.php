<?php

/**
* postModel
*/
class putNewsModel extends appModel
{
	private $sysRoot;
	private $dbh;
	private $id;
	private $putData;

	function __construct($s, $i)
	{
		$this->sysRoot = $s;
		$this->id = $i;
		//parse_str(file_get_contents('php://input'), $this->putData);
		$this->putData = $_POST;
		$this->dbh = $this->connectDB();
	}

	function run() {

		$sql = 'update news set title = :title, content = :content, author = :author, created = :created where news_id = :id';

		$values = array(
			':id'=> $this->id,
			':title'=> $this->putData['title'],
			':content'=> $this->putData['content'],
			':author'=> $this->putData['author'],
			'created'=> $this->putData['created'],
		);

		$resultImg = true;

		if($this->putData['images'] != 0) {

			$insertImageSql = 'insert into images(news_id, image_src, image_alt) values(:news_id, :image_src, :image_alt);';
			$updateImageSql = 'update images set image_src = :image_src, image_alt = :image_alt where image_id = :image_id;';

			for($i = 0; $i < $this->putData['images']; $i++) {
				if($this->putData['image_id' . ($i + 1)] == '') {
					// insert
					$imageValues = array(
						'news_id'=> $this->id,
						'image_src'=> $this->putData['image_src' . ($i+1)],
						'image_alt'=> $this->putData['image_alt' . ($i+1)]
					);

					$resultImg = $this->insert($this->dbh, $insertImageSql, $imageValues) && $resultImg;
				}
				else {
					// update
					$imageValues = array(
						'image_id'=> $this->putData['image_id' . ($i+1)],
						'image_src'=> $this->putData['image_src' . ($i+1)],
						'image_alt'=> $this->putData['image_alt' . ($i+1)]
					);

					$resultImg = $this->insert($this->dbh, $updateImageSql, $imageValues) && $resultImg;
				}
			}

			// DBに格納されているimgのカラム数よりputData['images']のほうが少ない = putDataに合わせて必要のないカラムをDBから削除する必要がある。 

			/*
			$selectImageSql = 'select count(*) as col from images where news_id = :news_id';
			$selectImageValue =  array(':news_id' => $this->id);
			$col = $this->fetch($this->dbh, $selectImageSql, $selectImageValue);

			if($col[0]['col'] > $this->putData['images']) {
				$deleteImageSql = 'delete from images where news_id = :news_id and NOT(image_id = :image_id)';

				$deleteImageValue = array(
					':news_id' => $this->id,
					':image_id' => ''
				);

				for($i = 0; $i < $this->putData['images']; $i++) {

					if(0 < $i) {
						$deleteImageValue[':image_id'] .= ' and ';
					}

					$deleteImageValue[':image_id'] .= $this->putData['image_id' . ($i + 1)];
				}

				$deleteResults = $this->insert($this->dbh, $deleteImageSql, $deleteImageValue);
			}
			*/
		}

		$result1 = $this->insert($this->dbh, $sql, $values);

		$result = $result1 && $resultImg;

		return array('result'=> $result);
	}
}