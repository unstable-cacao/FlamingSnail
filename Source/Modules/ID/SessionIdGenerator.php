<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class SessionIdGenerator
{
	use TStaticClass;
	
	
	public static function generate(): string 
	{
		$encoded = base64_encode(random_bytes(120));
		$alphanumeric = str_replace(['/', '+', '='], '', $encoded);
		
		return substr($alphanumeric, 0, 120);
	}
}