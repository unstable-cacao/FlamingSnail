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
				Cookie::create('fss', SessionIdGenerator::generate(), self::SESSION_TTL)
			]
		);
	}
	
	public function join(IInput $input)
	{
		$username = $input->withLength(1, 32)->require('username');
		$roomID = $input->require('roomID');
		
		return Response::with(
			200,
			[],
			null,
			[
				Cookie::create('fss', SessionIdGenerator::generate(), self::SESSION_TTL)
			]
		);
	}
	
	public function update(IInput $input)
	{
		$changes = $input->require('changes');
		return Response::with(200);
	}
	
	public function pull(IInput $input)
	{
		$since = $input->require('since');
		return Response::with(
			200,
			[],
			jsonencode([
				'changes' => [
					'key' => 'value'
				]
			])
		);
	}
}