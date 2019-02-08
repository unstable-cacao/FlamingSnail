<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class RoomIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string
	{
		return 'room' . IdGenerator::generate(13);
	}
}