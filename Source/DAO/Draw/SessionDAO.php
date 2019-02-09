<?php
namespace FlamingSnail\DAO\Draw;


use FlamingSnail\Base\DAO\Draw\ISessionDAO;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Draw\Session;
use Snuggle\Base\IConnector;


class SessionDAO implements ISessionDAO
{
	private const CONNECTION_TABLE_NAME = 'session';
	
	
	/** @var IConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = CouchDBConnector::conn();
	}
	
	
	public function load(string $id): ?Session
	{
		$data = $this->connector->get()
			->ignoreMissing()
			->queryDoc(self::CONNECTION_TABLE_NAME, $id);
		
		if (!$data)
			return null;
		
		$session = new Session();
		$session->fromArray($data->Data);
		
		return $session;
	}
	
	public function save(Session $session): bool
	{
		return $this->connector
			->store()
			->data($session->toArray())
			->into(self::CONNECTION_TABLE_NAME)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
}