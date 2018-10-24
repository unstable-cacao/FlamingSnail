<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class LogIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string
	{
		return 'log' . IdGenerator::generate(13);
	}
}