<?php 

/**
* truncateController
*/
class truncateController
{
	private $sysRoot;	

	function __construct($s) {
		$this->sysRoot = $s;
	}

	function run() {

		require_once $this->sysRoot . '/Model/appModel.php';

		require_once $this->sysRoot . '/Model/truncateModel.php';

		$model = new truncateModel();

		// run the func
		$response = $model->run();

		// display the data as json
		echo json_encode($response);
	}
}