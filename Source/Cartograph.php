<?php
namespace FlamingSnail;


use Traitor\TStaticClass;


class Cartograph
{
	use TStaticClass;
	
	
	/** @var \Cartograph\Cartograph */
	private static $cartograph;
	
	
	private static function configureCartograph(): void
	{
		self::$cartograph = new \Cartograph\Cartograph();
		self::$cartograph
			->addDir(__DIR__ . '/Utils/Mappers');
	}
	
	
	public static function cartograph(): \Cartograph\Cartograph
	{
		if (!self::$cartograph)
			self::configureCartograph();
		
		return self::$cartograph;
	}
}