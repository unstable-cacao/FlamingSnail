<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IEntityTypeDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\EntityType;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class EntityTypeDAO implements IEntityTypeDAO
{
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
		return $this->connector->save($entityType);
	}
	
	public function loadSheetIDs(int $entityTypeID): array
	{
		return $this->connector->getConnector()
			->select()
			->column('SheetID')
			->from('EntityTypeSheets')
			->byField('EntityTypeID', $entityTypeID)
			->queryColumn();
	}
}