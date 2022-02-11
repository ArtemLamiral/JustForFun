<?php
namespace App\Entity

abstract class AbstractEntity
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