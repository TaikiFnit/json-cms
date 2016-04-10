<?php 

/**
* imgController
*/
class imgController
{
	private $sysRoot;
	private $imgName;
	private $method;
	
	function __construct($s, $i, $m)
	{
		$this->sysRoot = $s;
		$this->imgName = $i;
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

		// HTTP METHOD に対応したModelをインスタンス化
		require_once $this->sysRoot . '/Model/' . mb_strtolower($this->method) . 'ImgModel.php';

		// define class name
		$className = mb_strtolower($this->method) . 'ImgModel';

		// instance the model
		$methodModel = new $className($this->sysRoot, $this->imgName);

		// run the func
		$response = $methodModel->run();

		// display the data as json
		echo json_encode($response);
	}
}