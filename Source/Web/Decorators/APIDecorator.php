<?php
namespace FlamingSnail\Web\Decorators;


use WebCore\IWebResponse;
use WebServer\Base\IActionResponse;


class APIDecorator
{
	public function complete(IWebResponse $response, IActionResponse $actionResponse): void
    {
        $response->setHeader('Content-Type', 'application/json');
        
        if (!$actionResponse->isSet())
        {
            // Empty response with status
            // Other than 204
            // Will invoke sad jquery error
            $response->setCode(204);
        }
    }
}