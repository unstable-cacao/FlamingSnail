<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IUserDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\User;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class UserDAO implements IUserDAO
{
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(User::class, ['Created', 'Modified'])
			->setTable('User')
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?User
	{
		return $this->connector->loadById($id);
	}
	
	public function loadByEmail(string $email): ?User
	{
		return $this->connector->selectObjectByField('Email', $email);
	}
	
	public function loadByUsername(string $username): ?User
	{
		return $this->connector->selectObjectByField('Username', $username);
	}
	
	public function save(User $user): bool 
	{
		return $this->connector->save($user);
	}
}