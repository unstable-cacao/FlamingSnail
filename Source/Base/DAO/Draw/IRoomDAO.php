<?php
namespace FlamingSnail\Base\DAO\Draw;


use FlamingSnail\Objects\Draw\Room;


interface IRoomDAO
{
	public function load(string $id): ?Room;
	public function save(Room $room): bool;
}