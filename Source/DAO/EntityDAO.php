<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\IEntityDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\Entity;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class EntityDAO implements IEntityDAO
{
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
		return $this->connector->save($entity);
	}
	
	public function loadPageIDs(int $entityID): array 
	{
		return $this->connector->getConnector()
			->select()
			->column('PageID')
			->from('EntityPages')
			->byField('EntityID', $entityID)
			->queryColumn();
	}
}