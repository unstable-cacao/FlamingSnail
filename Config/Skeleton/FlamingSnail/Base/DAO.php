<?php

$this->set(\FlamingSnail\Base\DAO\IUserDAO::class, \FlamingSnail\DAO\UserDAO::class);
$this->set(\FlamingSnail\Base\DAO\ISessionDAO::class, \FlamingSnail\DAO\SessionDAO::class);
$this->set(\FlamingSnail\Base\DAO\IGameDAO::class, \FlamingSnail\DAO\GameDAO::class);