<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Game;


interface IGameDAO
{
	public function load(int $id): ?Game;
	public function save(Game $user): bool;
}