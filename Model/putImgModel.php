<?php

/**
* putImgModel
*/
class putImgModel extends appModel
{
	private $sysRoot;
	private $imgName;
	private $putData;

	function __construct($s, $i)
	{
		$this->sysRoot = $s;
		$this->imgName = $i;
		$this->putData = $_POST;		
		//parse_str(file_get_contents('php://input'), $this->putData);
	}

	function run() {

		//$base = $this->sysRoot . '/public' . NEWS_IMAGE_PATH;

		//$old = $base . $this->imgName;
		//$new = $base . $this->putData['newImgName'];

		//return array('result'=> rename($old, $new));

		$old = REMOTE_FILE . $this->imgName;
		$new = REMOTE_FILE . $this->putData['newImgName'];

		return array('result'=> $this->ftpRename($old, $new));
	}	
}