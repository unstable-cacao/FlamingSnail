<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class ActionType
{
	use TEnum;
	
	
	public const CREATE = 'create';
	public const UPDATE = 'update';
	public const DELETE = 'delete';
}