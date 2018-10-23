<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class SessionIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string 
	{
		return IdGenerator::generate(120);
	}
}