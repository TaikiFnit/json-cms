<?php

/**
* staticController
*/
class staticController
{
	private $sysRoot;
	private $controller;
	private $id;

	function __construct($s, $c, $i)
	{
		$this->sysRoot = $s;
		$this->controller = $c;
		$this->id = $i;
	}

	function run() {

		require_once $this->sysRoot . '/Controller/templateController.php';

		$tpl = new templateController($this->sysRoot);

		$filePath = $this->sysRoot . '/View/' . $this->controller . 'View.php';

		$tpl->show($filePath);
	}
}