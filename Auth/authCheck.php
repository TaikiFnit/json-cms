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
			return ture;
		}

		// but access
		header('Location: /login');
		return false;
	}
}