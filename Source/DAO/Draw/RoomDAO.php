<?php
namespace FlamingSnail\DAO\Draw;


use FlamingSnail\Base\DAO\Draw\IRoomDAO;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Draw\Room;
use Snuggle\Base\IConnector;


class RoomDAO implements IRoomDAO
{
	private const CONNECTION_TABLE_NAME = 'room';
	
	
	/** @var IConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = CouchDBConnector::conn();
	}
	
	
	public function load(string $id): ?Room
	{
		$data = $this->connector->get()
			->ignoreMissing()
			->queryDoc(self::CONNECTION_TABLE_NAME, $id);
		
		if (!$data)
			return null;
		
		$room = new Room();
		$room->fromArray($data->Data);
		
		return $room;
	}
	
	public function save(Room $room): bool
	{
		return $this->connector
			->store()
			->data($room->toArray())
			->into(self::CONNECTION_TABLE_NAME)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
}