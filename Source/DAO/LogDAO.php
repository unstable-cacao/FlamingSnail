<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ILogDAO;
use FlamingSnail\Base\DAO\Log\ILogBuilder;
use FlamingSnail\Cartograph;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\DAO\Log\LogBuilder;
use FlamingSnail\Objects\Log;
use Snuggle\Base\IConnector;


class LogDAO implements ILogDAO
{
	private static $DBName = 'log';
	
	
	/** @var IConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = CouchDBConnector::conn();
	}
	
	
	public function getBuilder(): ILogBuilder
	{
		return new LogBuilder($this);
	}
	
	public function load(string $id): ?Log
	{
		$data = $this->connector->get()
			->ignoreMissing()
			->queryDoc(self::$DBName, $id);
		
		if (!$data)
			return null;
		
		$log = Cartograph::cartograph()->map()->from($data->toData())->into(Log::class);
		
		return $log;
	}
	
	public function save(Log $log): bool
	{
		$data = $log->getArray();
		
		return $this->connector
			->store()
			->data($data)
			->into(self::$DBName)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
}