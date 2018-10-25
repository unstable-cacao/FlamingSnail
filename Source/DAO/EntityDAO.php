<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IEntityDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\Entity;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class EntityDAO implements IEntityDAO
{
	private const CONNECTION_TABLE_NAME = 'EntityPages';
	
	
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(Entity::class, ['Created', 'Modified', 'PageIDs'])
			->setTable('Entity')
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?Entity
	{
		/** @var Entity $entity */
		$entity = $this->connector->loadById($id);
		
		if (!$entity)
			return null;
		
		$entity->PageIDs = $this->loadPageIDs($id);
		
		return $entity;
	}
	
	public function save(Entity $entity): bool
	{
		$res = $this->connector->save($entity);
		$res = $this->deletePageIDsNotInList($entity->ID, $entity->PageIDs) && $res;
		$res = $this->savePageIDs($entity->ID, $entity->PageIDs) && $res;
		
		return $res;
	}
	
	public function loadPageIDs(int $entityID): array 
	{
		return $this->connector->getConnector()
			->select()
			->column('PageID')
			->from(self::CONNECTION_TABLE_NAME)
			->byField('EntityID', $entityID)
			->queryColumn();
	}
	
	public function savePageIDs(int $entityID, array $pageIDs): bool 
	{
		if (!$pageIDs)
			return true;
		
		$values = [];
		
		foreach ($pageIDs as $pageID)
		{
			$values[] = ['EntityID' => $entityID, 'PageID' => $pageID];
		}
		
		$query = $this->connector->getConnector()
			->insert()
			->ignore()
			->into(self::CONNECTION_TABLE_NAME)
			->valuesBulk($values);
		
		return $query->executeDml();
	}
	
	public function deletePageIDsNotInList(int $entityID, array $pageIDs): bool
	{
		$query = $this->connector->getConnector()
			->delete()
			->from(self::CONNECTION_TABLE_NAME)
			->byField('EntityID', $entityID);
		
		if ($pageIDs)
		{
			$query->whereNotIn('PageID', $pageIDs);
		}
		
		return $query->executeDml();
	}
}