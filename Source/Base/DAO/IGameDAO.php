<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Game;


interface IGameDAO
{
    public function load(int $ID): ?Game;
    public function save(Game $user): bool;
}