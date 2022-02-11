<?php

//Реализовать с помощью исключений
class Autoloader{

	public static function register()
	{
		spl_autoload_register(function($class){

			$resultClassName = str_replace('App\\', '', $class);
			$file = __DIR__."\\".$resultClassName.'.php';

			if(file_exists($file))
			{	
				require_once $file;

				return true;
			}else{
			}
			return false;
		});
	}
}

Autoloader::register();

