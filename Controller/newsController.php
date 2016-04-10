<?php

/**
* newsController
*/
class newsController
{
	private $sysRoot;
	private $id;
	private $method;

	function __construct($s, $i, $m)
	{
		$this->sysRoot = $s;
		$this->id = $i;
		$this->method = $m;
	}


	function run() {

		// レンタルサーバーではPUT METHODが使用できないためPOSTで代用
		if(isset($_POST["method"]) == true) {
			if($_POST["method"] == "PUT") {
				$this->method = "PUT";
			}
		}

		require_once $this->sysRoot . '/Model/appModel.php';

		$lowerMethod = mb_strtolower($this->method);

		$modelPath = $this->sysRoot . '/Model/' . $lowerMethod . 'NewsModel.php';

		// HTTP METHOD に対応したModelをインスタンス化
		require_once $modelPath;

		// define class name
		$className = $lowerMethod . 'NewsModel';

		// instance the model
		$methodModel = new $className($this->sysRoot, $this->id);

		// run the func
		$response = $methodModel->run();

		// display the data as json
		echo json_encode($response);
	}
}