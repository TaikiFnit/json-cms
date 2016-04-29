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
		// 新しく追加する記事の番号番号を取得
		$checkNewsId = 'select max(news_id) as id from news;';
		$results = $this->fetch($this->dbh, $checkNewsId, array());
		$id = $results[0]['id'];

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
			//$imageName[$i] .= $year;
			//$imageName[$i] .= '-';
			$imageName[$i] .= $id;
			$imageName[$i] .= '-';
			$imageName[$i] .= (string)((int)$i + 1);
			// 2016/04/25 extensionがあるとcross domainでひっかかるので削除
			//$imageName[$i] .= '.';
			//$imageName[$i] .= $path_parts['extension'];

			// define the image name according to its news_id.
			//$imageName[$i] = $year . '-' . $id . '-' . ((int)$i + 1) . '.' . $info->getExtension();

			// 画像をpublic/news_images/にsave
			//move_uploaded_file($_FILES['image' . (string)((int)$i + 1)]['tmp_name'], $updir . $imageName[$i]);

			// update the image using ftp
			$this->ftpUpload($_FILES['image' . (string)((int)$i + 1)]['tmp_name'], $imageName[$i]);
		}

		//$sql = 'insert into news(news_id, title, content, author, created, images, image_src1, image_src2, image_alt1, image_alt2) values(:news_id, :title, :content, :author, :created, :images, :image_src1, :image_src2, :image_alt1, :image_alt2)';
		$sql = 'insert into news(news_id, title, content, author, created) values(:news_id, :title, :content, :author, :created)';

		$values = array(
			':news_id'=> $id,
			':title'=> $this->postData['title'],
			':content'=> $this->postData['content'],
			':author'=> $this->postData['author'],
			':created'=> $this->postData['created']
		);

		/*
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
		*/

		if($this->postData['images'] != 0) {

			$imageSql = '';

			// 画像が1枚以上存在する場合は、database に画像の保存場所とその解説を保存

			if($this->postData['images'] >= 1) {
				$imageSql = 'insert into images(news_id, image_src, image_alt) values';
			}

			// placeholderを使用したSQL文を構築
			for($i = 0; $i < $this->postData['images']; $i++) {

				if(0 < $i) {
					$imageSql .= ', ';	
				}

				$imageSql .= '(:news_id, :image_src' . $i . ', :image_alt' . $i . ')';
			}

			$imageValues = array(':news_id'=> $id);

			// dataをbind
			for($i = 0; $i < $this->postData['images']; $i++) {

				$imageValues['image_src' . $i] = isset($imageName[$i]) == true ? $imageName[$i] : '';
				$imageValues['image_alt' . $i] = $this->postData['image_alt' . ($i + 1)];
			}
		}
		else {
			$result2 = true;
		}

		// 2つのinsertはトランザクション処理化したほうが望ましい
		$result1 = $this->insert($this->dbh, $sql, $values);
		
		if($this->postData['images'] != 0) {
			$result2 = $this->insert($this->dbh, $imageSql, $imageValues);
		}

		$result =  $result1 && $result2;

		return array('result'=> $result);
	}
}