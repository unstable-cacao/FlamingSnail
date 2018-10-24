<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISheetDAO;
use FlamingSnail\Cartograph;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Modules\ID\SheetIdGenerator;
use FlamingSnail\Objects\Sheet;
use FlamingSnail\Utils\Time;
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
	
	
	public function load(string $id): ?Sheet
	{
		$data = $this->connector->get()
			->ignoreMissing()
			->queryDoc(self::$DBName, $id);
		
		if (!$data)
			return null;
		
		$sheet = Cartograph::cartograph()->map()->from($data->toData())->into(Sheet::class); 
		
		return $sheet;
	}
	
	public function save(Sheet $sheet): bool
	{
		$sheet->Modified = Time::now();
		
		$data = $sheet->getArray();
		
		return $this->connector
			->store()
			->data($data)
			->into(self::$DBName)
			->overrideConflict()
			->execute()
			->isSuccessful();
	}
	
	public function cloneSheet(string $id): Sheet
    {
        $sheet = $this->load($id);
        
        if (!$sheet)
            throw new \Exception("Sheet with ID $id was not found");
        
        $sheet->ID = SheetIdGenerator::generate();
        $sheet->RevisionID = null;
        
        $this->save($sheet);
        
        return $sheet;
    }
}