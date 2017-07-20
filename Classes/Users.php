<?php

/**
 @Author Alex Willian
 @email alexwcaffonso@gmail.com
*/

class Users
{

	private $dao;	
	private $name;
	private $email;
	private $password;
	private $created;
	private $updated;

	function __construct()
	{
		$this->dao = new DAO();
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getCreated()
	{
		return $this->created;
	}

	public function setCreated($created)
	{
		$this->created = $created;
	}

	public function getUpdated()
	{
		return $this->updated;
	}

	public function setUpdated($updated)
	{
		$this->updated = $updated;
	}

	public function show($id)
	{
		$query = $this->dao->select("SELECT * FROM users WHERE id = :ID", [":ID"=>$id]);
		
		if(count($query) > 0)
		{
			$row = $query[0];

			$this->setName($row['name']);
			$this->setEmail($row['email']);
			$this->setPassword($row['password']);
			$this->setCreated(new DateTime($row['created_at']));
			$this->setUpdated(new DateTime($row['updated_at']));
		}

	}

	public static function all()
	{
		$sql = new DAO();
		return $sql->select("SELECT * FROM users ORDER BY name");
	}

	public function __toString()
	{
		return json_encode([
			"name" 			=> $this->getName(),
			"email" 		=> $this->getEmail(),
			"password"		=> $this->getPassword(),
			"created_at"	=> $this->getCreated()->format("d-m-Y H:i:s"),
			"updated_at" 	=> $this->getUpdated()->format("d-m-Y H:i:s"),
			]);
	}

}