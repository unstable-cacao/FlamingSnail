<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IEntityTypeDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\EntityType;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class EntityTypeDAO implements IEntityTypeDAO
{
	private const CONNECTION_TABLE_NAME = 'EntityTypeSheets';
	
	
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(EntityType::class, ['Created', 'Modified', 'SheetIDs'])
			->setTable('EntityType')
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?EntityType
	{
		/** @var EntityType $entity */
		$entityType = $this->connector->loadById($id);
		
		if (!$entityType)
			return null;
		
		$entityType->SheetIDs = $this->loadSheetIDs($id);
		
		return $entityType;
	}
	
	public function save(EntityType $entityType): bool
	{
		$res = $this->connector->save($entityType);
		$res = $this->deletePageIDsNotInList($entityType->ID, $entityType->SheetIDs) && $res;
		$res = $this->savePageIDs($entityType->ID, $entityType->SheetIDs) && $res;
		
		return $res;
	}
	
	public function loadSheetIDs(int $entityTypeID): array
	{
		return $this->connector->getConnector()
			->select()
			->column('SheetID')
			->from(self::CONNECTION_TABLE_NAME)
			->byField('EntityTypeID', $entityTypeID)
			->queryColumn();
	}
	
	public function savePageIDs(int $entityTypeID, array $sheetIDs): bool
	{
		if (!$sheetIDs)
			return true;
		
		$values = [];
		
		foreach ($sheetIDs as $sheetID)
		{
			$values[] = ['EntityTypeID' => $entityTypeID, 'SheetID' => $sheetID];
		}
		
		$query = $this->connector->getConnector()
			->insert()
			->ignore()
			->into(self::CONNECTION_TABLE_NAME)
			->valuesBulk($values);
		
		return $query->executeDml();
	}
	
	public function deletePageIDsNotInList(int $entityTypeID, array $sheetIDs): bool
	{
		$query = $this->connector->getConnector()
			->delete()
			->from(self::CONNECTION_TABLE_NAME)
			->byField('EntityTypeID', $entityTypeID);
		
		if ($sheetIDs)
		{
			$query->whereNotIn('SheetID', $sheetIDs);
		}
		
		return $query->executeDml();
	}
}