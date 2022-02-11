<?php

abstract class AbstractController
{
	protected static $controllerName;

	public function getName(): string
	{
		return self::$controllerName;
	}
}