<?php

/**
 @Author Alex Willian
 @email alexwcaffonso@gmail.com
*/
class DAO extends \PDO
{
	private $con;
	private $dsn = "mysql:host=localhost;dbname=blog";
	private $user = "root";
	private $senha = "1234";

	public function __construct()
	{
		$this->con = new PDO($this->dsn, $this->user, $this->senha);
	}

	public function query($query, $params=[])
	{
		$stmt = $this->con->prepare($query);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	private function setParams($stmt, $params=[])
	{
		foreach ($params as $key => $value) {
			$this->setParam($stmt, $key, $value);
		}
	}

	private function setParam($stmt, $key, $value)
	{
		$stmt->bindParam($key, $value);
	}

	public function select($query, $params=[])
	{
		$stmt = $this->query($query, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}