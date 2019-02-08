<?php

return [
	'controller' 	=> \FlamingSnail\Web\Controllers\DrawRoomsController::class,
	'action' 		=> 'create',
	'route' 		=> '*',
	'decorator'		=> \FlamingSnail\Web\Decorators\APIDecorator::class
];