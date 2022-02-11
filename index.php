<?php

class Routing
{
	protected $url;

	public function __construct(string $url)
	{
		$this->url = $url;
	}

	public function start()
	{
		$myRoutes = $this->parseUrl();

		var_dump($myRoutes);

		if(count($myRoutes) == 1)
		{
			//Отображаю главную страницу
		}

		$route = $myRoutes[1];

		require "src/PHP/Controllers/routes.php";

		if(!isset($routes[$route]))
		{
			throw new Exception("Error Processing Request", 1);
		}

		var_dump($controllers);

		$controllerPath = 'src/PHP/Controllers/'.$className.'.php';

		if(!file_exists($controllerPath))
		{	
			$errorMessage = "Controller with path ".$controllerPath." does not exist";
			throw new Exception($errorMessage, 1);

			return;
		}

		require $controllerPath;

		$controller = new $className();
	}

	protected function parseUrl(): array
	{
		$routes = explode('/',$this->url);
		$routes = array_slice($routes, 1);

		return $routes;
	}
}

$url = $_SERVER['REQUEST_URI'];
$route = new Routing($url);

try{
	$route->start();
}catch(Exception $e)
{
	echo $e->getMessage();
}
