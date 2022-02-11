<?php

namespace App\Controllers;

class IndexController
{
	
	protected static $nameController;

	public function __construct()
	{
		self::$nameController = 'index';
	}

	public function index()
	{
		$index_html = "<div> <h1> Hello,world </h1> </div>";

		return $index_html;
	}

	public static getName(): string
	{
		return self::$nameController;
	}
}