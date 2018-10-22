<?php
namespace FlamingSnail;


use Snuggle\Base\IConnector;
use Snuggle\CouchDB;


class CouchDBConnector
{
	/** @var IConnector */
	private static $couchDB;
	
	
	public static function conn(): IConnector
	{
		if (!self::$couchDB)
		{
			self::$couchDB = new CouchDB();
			self::$couchDB->config()
				->addConnection([
					'host' => '127.0.0.1',
					'user' => 'admin',
					'pass' => '1234'
				]);
		}
		
		return self::$couchDB->connector();
	}
}