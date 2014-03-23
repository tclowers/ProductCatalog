<?php
	function autoLoader($className) {
		if(!@include_once 'class/' . $className . '_class.php') {
			$downcase = strtolower($className);
			include_once 'class/' . $downcase . '_class.php';
		}
	}

	////////////////////////////////
	//function below is too slow ///
	////////////////////////////////
	/*function autoLoader($className) {
		$directories = array('', 'class/');

		$fileNameFormats = array(
			'%s.php',
			'%s_class.php',
			'class.%s.php'
			);

		foreach ($directories as $directory) {
			foreach($fileNameFormats as $fileNameFormat) {
				$path = $directory.sprintf($fileNameFormat, $className);
				$downcase = strtolower($className);
				$lowerpath = $directory.sprintf($fileNameFormat, $downcase);
				if (file_exists($path)) {
					include_once $path;
					return;
				} elseif (file_exists($lowerpath)) {
					include_once $lowerpath;
					return;
				}
			}
		}
	}*/

	spl_autoload_register('autoLoader');
?>