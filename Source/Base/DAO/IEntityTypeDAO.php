<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\EntityType;


interface IEntityTypeDAO
{
	public function load(int $id): ?EntityType;
	public function save(EntityType $entityType): bool;
	public function loadSheetIDs(int $entityTypeID): array;
}