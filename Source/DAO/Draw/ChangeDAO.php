<?php
namespace FlamingSnail\DAO\Draw;


use FlamingSnail\Base\DAO\Draw\IChangeDAO;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Draw\Change;
use Snuggle\Base\IConnector;


class ChangeDAO implements IChangeDAO
{
	private const CONNECTION_TABLE_NAME = 'change';
	
	
	/** @var IConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = CouchDBConnector::conn();
	}
	
	
	public function save(Change $change): bool
	{
		return $this->connector
			->store()
			->data($change->toArray())
			->into(self::CONNECTION_TABLE_NAME)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
}