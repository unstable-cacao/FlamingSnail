<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Entity;


interface IEntityDAO
{
	public function load(int $id): ?Entity;
	public function save(Entity $entity): bool;
	public function loadPageIDs(int $entityID): array;
}