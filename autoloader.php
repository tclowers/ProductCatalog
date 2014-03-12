<?php
	function autoLoader($className) {
		if(!@include_once 'class/' . $className . '_class.php') {
			$downcase = strtolower($className);
			include_once 'class/' . $downcase . '_class.php';
		}
	}

	spl_autoload_register('autoLoader');
?>