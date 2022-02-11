<?php

interface AbstractLoggerInterface
{
	public static function log(string $logStr): void;

	public const LOG_BUFFER_LIMIT = 5;
}


abstract class AbstractLogger implements AbstractLoggerInterface
{	
	protected static $logBuffer = array();
	protected static $logFile;

	protected static $title;

	public static function set($filePath,$title)
	{
		if(self::$logFile)
		{
			return;
		}

		self::$title = $title;
		self::$logFile = fopen($filePath,'w');

		$startSession = "[".date("Y-m-d_h: i : s ") ."(self::$title)]\n ";

		fwrite(self::$logFile, $startSession);
	}

	public static function log(string $logStr):void 
	{	
		$prefix = "[".date("Y-m-d_h: i : s ") ."(self::$title)] ";
		$resultLogStr = $prefix." ".$logStr."\n";

		self::$logBuffer[] = $resultLogStr;

		if(count(self::$logBuffer) >= self::LOG_BUFFER_LIMIT)
		{
			self::push();
		}
	}

	public static function logInFile(): void
	{
		self::push();
	}

	protected function close(): void
	{
		self::push();
		fclose(self::$logFile);
	}

	protected function push(): void
	{
		if(self::$logFile)
		{
			fputs(self::$logFile, join("",self::$logBuffer));
		}
	}
}

class Logger extends AbstractLogger
{
	
}