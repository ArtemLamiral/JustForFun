<?php

$config = [
	'dbname' => 'mysqldb2',
	'root' =>'mysql',
	'password' =>'',
	'host' =>'localhost'
];

interface AbsctractRepositoryInterface
{
	public function findAll();

	/*public static function find(array $params);

	public static function findOne(array $params);
	public static function findOneById(int $id);*/
}



abstract class Orm 
{
	protected $dbname;

	protected $dbn;

	protected $root;
	protected $password;
	protected $host;

	protected bool $connection;

	public function __construct()
	{
		$this->connection = false;
	}

	public function setConnection($basename,): bool
	{	
		$host = $config['host'];
		$dbname = $config['dbname'];
		$root = $config['root'];
		$password = $config['password'];

		if(!isset($this->dbn))
		{
			try{
				$this->pdo = new PDO("mysql:host=$host;dbname=$dbname",$root,$password);
			}catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}	
	}

	protected function isConnected():void
	{
		return $this->connection;
	}
	
}

abstract class AbsctractRepository extends Orm implements AbsctractRepositoryInterface
{
	protected string $entity;

	public function findAll()
	{
		if($this->isConnected)
		{

		}
		$sql = "SELECT * FROM $this->entity->name";
		
	}
}

?>