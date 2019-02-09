<?php
namespace FlamingSnail\Web\Controllers;


use Cartograph\Utilities\Narrow;
use FlamingSnail\Base\DAO\Draw\IChangeDAO;
use FlamingSnail\Base\DAO\Draw\IRoomDAO;
use FlamingSnail\Base\DAO\Draw\ISessionDAO;
use FlamingSnail\Modules\ID\RoomIdGenerator;
use FlamingSnail\Modules\ID\SessionIdGenerator;
use FlamingSnail\Objects\Draw\Change;
use FlamingSnail\Objects\Draw\Room;
use FlamingSnail\Objects\Draw\Session;
use FlamingSnail\SkeletonInit;
use WebCore\Cookie;
use WebCore\IInput;
use WebServer\Response;


class DrawRoomsController
{
	public const SESSION_TTL = 60 * 60 * 3;
	
	
	public function create(IInput $input)
	{
		$username = $input->withLength(1, 32)->require('username');
		
		$room = new Room();
		$room->ID = RoomIdGenerator::generate();
		$room->Revision = 1;
		
		SkeletonInit::skeleton(IRoomDAO::class)->save($room);
		
		$session = new Session();
		$session->ID = SessionIdGenerator::generate();
		$session->Username = $username;
		$session->RoomID = $room->ID;
		
		SkeletonInit::skeleton(ISessionDAO::class)->save($session);
		
		$change = new Change();
		$change->RoomID = $room->ID;
		$change->Joined[] = $username;
		
		SkeletonInit::skeleton(IChangeDAO::class)->save($change);
		
		return Response::with(
			200,
			[],
			jsonencode(['roomId' => $room->ID]),
			[
				Cookie::create('fss', $session->SessionID, self::SESSION_TTL)
			]
		);
	}
	
	public function join(IInput $input)
	{
		$username = $input->withLength(1, 32)->require('username');
		$roomID = $input->require('roomID');
		
		/** @var Room $room */
		$room = SkeletonInit::skeleton(IRoomDAO::class)->load($roomID);
		
		if (!$room)
			return Response::with(404);
		
		$room->Revision++;
		SkeletonInit::skeleton(IRoomDAO::class)->save($room);
		
		$change = new Change();
		$change->Joined[] = $username;
		$change->RoomID = $roomID;
		
		SkeletonInit::skeleton(IChangeDAO::class)->save($change);
		
		$session = new Session();
		$session->ID = SessionIdGenerator::generate();
		$session->Username = $username;
		$session->RoomID = $roomID;
		
		return Response::with(
			200,
			[],
			jsonencode(Narrow::toArray($room)),
			[
				Cookie::create('fss', $session->ID, self::SESSION_TTL)
			]
		);
	}
	
	public function update(IInput $input)
	{
		$roomID = $input->require('roomID');
		$changes = $input->require('changes');
		
		/** @var Room $room */
		$room = SkeletonInit::skeleton(IRoomDAO::class)->load($roomID);
		
		if (!$room)
			return Response::with(404);
		
		$room->Revision++;
		SkeletonInit::skeleton(IRoomDAO::class)->save($room);
		
		$change = new Change();
		$change->fromArray(jsondecode($changes, true));
		$change->RoomID = $roomID;
		
		SkeletonInit::skeleton(IChangeDAO::class)->save($change);
		
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