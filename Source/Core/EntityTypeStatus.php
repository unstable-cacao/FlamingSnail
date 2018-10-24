<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class EntityTypeStatus
{
	use TEnum;
	
	
	public const ACTIVE 	= 'active';
	public const ARCHIVED 	= 'archived';
	public const DELETED 	= 'deleted';
}