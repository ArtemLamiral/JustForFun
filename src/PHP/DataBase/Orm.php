<?php

namespace App\DataBase\ORM;

abstract class DbObject
{
	public function flush();
}

interface AbstractOrm
{	
	public setConnection();
	//CREATE
	public static function creatBase();
	public static function createTable();

	//FIND
	public static findAll();

	public static function find(array $params);

	public static function findOne(array $params);
	public static function findOneById(int $id);

	/*
	//UPDATE AND DELETE
	public static function updateById(int $id);

	public static function deleteById(int $id);
	public static function deleteOne(array $params);
	*/
}	

abstract class Entity
{
	protected $fields = array();

	public function __set($name,$value)
	{
		if(isset($this->fields[$name]))
		{
			$this->fields[$name] = $value;
		}else{
			//throw expection
		}
	}

	public function __get($name,$value)
	{
		if(isset($this->fields[$name]))
		{
			return $this->fields[$name];
		}else{
			//throw expection
		}
	}
}



?>