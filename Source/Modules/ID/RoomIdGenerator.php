<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class RoomIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string
	{
		return IdGenerator::generate(13);
	}
}