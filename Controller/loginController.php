<?php

/**
* the controller class for login
*/
class loginController {

	private $sysRoot;

	function __construct($s)
	{
		$this->sysRoot = $s;
	}

	public function run() {

		require_once $this->sysRoot . '/Model/appModel.php';
		require_once $this->sysRoot . '/Model/loginModel.php';

		$loginModel = new loginModel($this->sysRoot, $_POST);

		$loginData = $loginModel->run();

		if(!empty($loginData)) {
			// success to login
			$_SESSION['name'] = $loginData['name'];
			header('Location: /');
		}
		else {
			// faild to login
			header('Location: /login');
		}
	}
}