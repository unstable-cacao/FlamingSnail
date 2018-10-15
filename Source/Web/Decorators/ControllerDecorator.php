<?php
namespace FlamingSnail\Web\Decorators;


use WebCore\IWebRequest;


class ControllerDecorator
{
    public function before(IWebRequest $request)
    {
        $sid = $request->getCookie('sid');
        
        if (!$sid)
            return;
    }
}