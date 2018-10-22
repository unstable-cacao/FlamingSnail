<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISheetDAO;
use FlamingSnail\Cartograph;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Sheet;
use Snuggle\Base\IConnector;


class SheetDAO implements ISheetDAO
{
	private static $DBName = 'sheet';
	
	
	/** @var IConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = CouchDBConnector::conn();
	}
	
	
	public function load(string $ID): ?Sheet
	{
		$data = $this->connector->get()
			->ignoreMissing()
			->queryDoc(self::$DBName, $ID);
		
		if (!$data)
			return null;
		
		$sheet = Cartograph::cartograph()->map()->from($data->toData())->into(Sheet::class); 
		
		return $sheet;
	}
	
	public function save(Sheet $sheet): bool
	{
		$data = $sheet->getArray();
		
		return $this->connector
			->store()
			->data($data)
			->into(self::$DBName)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
}