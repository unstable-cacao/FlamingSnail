<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IGameDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\Game;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class GameDAO implements IGameDAO
{
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(Game::class, ['Created', 'Modified'])
			->setTable('Game')
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?Game
	{
		return $this->connector->loadById($id);
	}
	
	public function save(Game $user): bool
	{
		return $this->connector->save($user);
	}
}