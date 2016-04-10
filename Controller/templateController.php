<?php

class templateController {

	private $sysRoot;
	private $filePath;

	function __construct($s) {
		$this->sysRoot = $s;
	}

	function show($filePath) {

		$this->filePath = $filePath;

		if(file_exists($filePath)) {

			extract(array($this));

			include $this->sysRoot . '/View/template.php';
		}
		else {
			header('Location: /');
		}
	}
}