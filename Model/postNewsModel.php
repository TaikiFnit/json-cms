<?php

/**
* postModel
*/
class postNewsModel extends appModel
{
	private $sysRoot;
	private $dbh;
	private $id;
	private $postData;

	function __construct($s, $i)
	{
		$this->sysRoot = $s;
		$this->id = $i;
		$this->postData = $_POST;
		$this->dbh = $this->connectDB();
	}

	function run() {

		// 記事番号を取得
		$checkNewsId = 'select max(news_id) as id, date_format(`created`, "%Y") as year from news where date_format(`created`, "%Y") = ' . date('Y', strtotime($this->postData['created'])) . ';';
		$results = $this->fetch($this->dbh, $checkNewsId, array());
		$id = $results[0]['id'];
		$year = $results[0]['year'];

		if($id != null) {
			// news番号をインクリメント
			$id += 1;
		}
		else {
			$id = 1;
		}

		$updir = $this->sysRoot . '/public' . NEWS_IMAGE_PATH;

		$imageName = array();

		// 画像の枚数分だけループ
		for($i = 0; $i < $this->postData['images']; $i++) {

			// the class to get the filename extension
			//$info = new SplFileInfo($_FILES['image1']['name']);

			//for php5.2
			$path_parts = pathinfo($_FILES['image' . (string)((int)$i + 1)]['name']);

			// split for php5.2
			$imageName[$i] = '';
			$imageName[$i] .= $year;
			$imageName[$i] .= '-';
			$imageName[$i] .= $id;
			$imageName[$i] .= '-';
			$imageName[$i] .= (string)((int)$i + 1);
			$imageName[$i] .= '.';
			$imageName[$i] .= $path_parts['extension'];

			// define the image name according to its news_id.
			//$imageName[$i] = $year . '-' . $id . '-' . ((int)$i + 1) . '.' . $info->getExtension();

			// 画像をpublic/news_images/にsave
			//move_uploaded_file($_FILES['image' . (string)((int)$i + 1)]['tmp_name'], $updir . $imageName[$i]);

			// update the image using ftp
			$this->ftpUpload($_FILES['image' . (string)((int)$i + 1)]['tmp_name'], $imageName[$i]);
		}

		$sql = 'insert into news(news_id, title, content, author, created, images, image_src1, image_src2, image_alt1, image_alt2) values(:news_id, :title, :content, :author, :created, :images, :image_src1, :image_src2, :image_alt1, :image_alt2)';

		$values = array(
			':news_id'=> $id,
			':title'=> $this->postData['title'],
			':content'=> $this->postData['content'],
			':author'=> $this->postData['author'],
			'created'=> $this->postData['created'],
			':images'=> $this->postData['images'],
			':image_src1'=> isset($imageName[0]) == true ? $imageName[0] : '',
			':image_src2'=> isset($imageName[1]) == true ? $imageName[1] : '',
			':image_alt1'=> $this->postData['image_alt1'],
			':image_alt2'=> $this->postData['image_alt2']
		);

		return array('result'=> $this->insert($this->dbh, $sql, $values));
	}
}