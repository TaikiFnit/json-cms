<?php

/**
* the class for authoraization check
*/
class authCheck {

	private $controller;
	private $method;

	function __construct($c, $m) {
		$this->controller = $c;
		$this->method = $m;
	}

	public function isLogined()
	{
		// check Logined

		session_start();

		if(isset($_SESSION['name'])) {
			// this user is already logged in.

			if ($this->controller == 'login') {
				// this user try to login
				// but already logged in.
				header('Location: /');
				return false;
			}

			return true;
		}

		// this user is not logged in.

		if ($this->controller == 'login') {
			// this user try to login
			return true;
		}

		if ($this->controller == 'news' && $this->method == 'GET') {
			return true;
		}

		// but access
		header('Location: /login');
		return false;
	}

	public function logout() {
		// clear session varilable
		$_SESSION = array();

		// destroy cookie
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}

		session_destroy();
	}
}