<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class GameStatus
{
	use TEnum;
	
	
	public const ACTIVE     = 'active';
	public const DELETED    = 'deleted';
}