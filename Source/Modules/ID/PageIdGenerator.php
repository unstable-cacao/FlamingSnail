<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class PageIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string
	{
		return 'pge' . IdGenerator::generate(13);
	}
}