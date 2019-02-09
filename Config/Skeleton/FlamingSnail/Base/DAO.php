<?php

$this->set(\FlamingSnail\Base\DAO\IUserDAO::class, \FlamingSnail\DAO\UserDAO::class);
$this->set(\FlamingSnail\Base\DAO\ISessionDAO::class, \FlamingSnail\DAO\SessionDAO::class);
$this->set(\FlamingSnail\Base\DAO\IGameDAO::class, \FlamingSnail\DAO\GameDAO::class);

$this->set(\FlamingSnail\Base\DAO\Draw\IRoomDAO::class, \FlamingSnail\DAO\Draw\RoomDAO::class);
$this->set(\FlamingSnail\Base\DAO\Draw\ISessionDAO::class, \FlamingSnail\DAO\Draw\SessionDAO::class);
$this->set(\FlamingSnail\Base\DAO\Draw\IChangeDAO::class, \FlamingSnail\DAO\Draw\ChangeDAO::class);