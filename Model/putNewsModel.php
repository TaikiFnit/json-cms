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

		$sql = 'update news set title = :title, content = :content, author = :author, created = :created, images = :images, image_src1 = :image_src1, image_src2 = :image_src2, image_alt1 = :image_alt1, image_alt2 = :image_alt2 where id = :id';

		$values = array(':id'=> $this->id, ':title'=> $this->putData['title'], ':content'=> $this->putData['content'], ':author'=> $this->putData['author'], 'created'=> $this->putData['created'], ':images'=> $this->putData['images'], ':image_src1'=> $this->putData['image_src1'], ':image_src2'=> $this->putData['image_src2'], ':image_alt1'=> $this->putData['image_alt1'], ':image_alt2'=> $this->putData['image_alt2']);

		return array('result'=> $this->insert($this->dbh, $sql, $values));
	}
}