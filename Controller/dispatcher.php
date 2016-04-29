<?php

// このクラスではリクエストに応じて使用するコントローラーのインスタンス化を行います

class dispatcher {

	private $sysRoot;

	function __construct($s) {
		$this->sysRoot = $s;
	}

	function run() {

		// authoraization
		require_once $this->sysRoot . '/Auth/authCheck.php';

		// 末端の / を削除
		if($_SERVER['REQUEST_URI'] != null) {
			$param = rtrim($_SERVER['REQUEST_URI'], '/');
		}

		$params = array();

		// パラメータを /　で分割
		if($param != '') {
			$params = explode('/', $param);
		}

		$controller = 'index';

		// controller名をセット
		if(0 < count($params)) {
			$controller = $params[1];
		}

		$controller = basename($controller, '.html');
		$controller = basename($controller, '.php');

		// redirect if user is not logined
		$auth = new authCheck($controller, $_SERVER["REQUEST_METHOD"]);

		if($auth->isLogined()) {

			// Controllerのインスタンス化
			switch($controller) {
				// コントロールページの表示
				case 'index':
				case 'get':
				case 'post':
				case 'put':
				case 'delete':
				case 'imgControll':
					// pages
					require_once $this->sysRoot . '/Controller/staticController.php';
					$id = isset($params[3]) == true ? $params[3] : '';
					$controllerInstance = new staticController($this->sysRoot, $controller, $id);
					break;

				case 'news':
					// newsに対するCRUD
					require_once $this->sysRoot . '/Controller/newsController.php';
					$method = isset($params[2]) == true ? $params[2] : '';
					$controllerInstance = new newsController($this->sysRoot, $method, $_SERVER["REQUEST_METHOD"]);
					break;

				case 'img':
					// imgに対するCRUD
					require_once $this->sysRoot . '/Controller/imgController.php';
					$method = isset($params[2]) == true ? $params[2] : '';
					$controllerInstance = new imgController($this->sysRoot, $method, $_SERVER['REQUEST_METHOD']);
					break;

				case 'login':
					// include loginController
					if($_SERVER['REQUEST_METHOD'] == 'GET') {
						require_once $this->sysRoot . '/Controller/staticController.php';
						$id = isset($params[3]) == true ? $params[3] : '';
						$controllerInstance = new staticController($this->sysRoot, $controller, $id);
					}
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						require_once $this->sysRoot . '/Controller/loginController.php';
						$controllerInstance = new loginController($this->sysRoot);
					}
					break;

				case 'logout' :

					$auth->logout();
					header('Location: /login');

					break;

				case 'truncate':
					if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
						require_once $this->sysRoot . '/Controller/truncateController.php';
						$controllerInstance = new truncateController($this->sysRoot);
					}
					break;

				default:
					header('Location: /');
					exit;
					break;
			}

			$controllerInstance->run();
		}
	}
}

