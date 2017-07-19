<?php

spl_autoload_register(function($class){

	$dir 	= "Classes";
	$file 	= $dir . DIRECTORY_SEPARATOR . $class . ".php" ;

	if(file_exists($file))
	{
		require_once($file);
	}


});