<?php

/**
* getImgModel
*/
class getImgModel extends appModel
{
	private $sysRoot;

	function __construct($s) {
		$this->sysRoot = $s;
	}

	function run() {

		//$dir = $this->sysRoot . '/public' . NEWS_IMAGE_PATH;

		// scan file list
		//$res = scandir($dir);

		// remove . and .. from file list
		//array_shift($res);
		//array_shift($res);

		$results = $this->ftpFileList(REMOTE_FILE);

		for($i = 0; $i < count($results); $i++) {
			$tmp = explode("/", $results[$i]);
			$results[$i] = end($tmp);
		}

		// return results
		return $results;

	}
}