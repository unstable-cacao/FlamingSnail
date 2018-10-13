<?php
namespace FlamingSnail;


use Skeleton\ConfigLoader\DirectoryConfigLoader;
use Skeleton\Skeleton;
use Traitor\TStaticClass;


class SkeletonInit
{
	use TStaticClass;
	
	
	/** @var Skeleton */
	private static $skeleton;
	
	
	private static function configureSkeleton(): void
	{
		self::$skeleton = new Skeleton();
		self::$skeleton
			->enableKnot()
			->useGlobal()
			->registerGlobalFor(__NAMESPACE__)
			->setConfigLoader(
				new DirectoryConfigLoader(realpath(__DIR__ . '/../Config/Skeleton'))
			);
	}


	/**
	 * @param string|null $interface
	 * @return mixed|Skeleton
	 */
	public static function skeleton(?string $interface = null)
	{
		if (!self::$skeleton)
			self::configureSkeleton();
		
		if ($interface)
			return self::$skeleton->get($interface);
		
		return self::$skeleton;
	}
}