<?php
namespace FlamingSnail\Utils;


use Traitor\TStaticClass;


class Time
{
	use TStaticClass;
	
	
	public const DATE_TIME_FORMAT = 'Y-m-d H:i:s';
	
	
	public static function now(): string 
	{
		return date(self::DATE_TIME_FORMAT);
	}
}