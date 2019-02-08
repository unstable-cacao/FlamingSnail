<?php
namespace FlamingSnail\Web\Controllers;


use FlamingSnail\Modules\ID\RoomIdGenerator;
use FlamingSnail\Modules\ID\SessionIdGenerator;
use WebCore\Cookie;
use WebCore\IInput;
use WebServer\Response;


class DrawRoomsController
{
	public const SESSION_TTL = 60 * 60 * 3;
	
	
	public function create(IInput $input)
	{
		$username = $input->withLength(1, 32)->require('username');
		return Response::with(
			200,
			[],
			jsonencode(['roomId' => RoomIdGenerator::generate()]),
			[
				Cookie::create('SID', SessionIdGenerator::generate(), self::SESSION_TTL)
			]
		);
	}
}