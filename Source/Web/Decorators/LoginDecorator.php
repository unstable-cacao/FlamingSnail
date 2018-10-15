<?php
namespace FlamingSnail\Web\Decorators;


class LoginDecorator
{
    public const MIN_LOGIN_TIME = 0.1;
    
    
    /** @var float */
    private $requestTime;
    
    
    public function before()
    {
        $this->requestTime = microtime(true);
    }
    
    public function after()
    {
        $requestTime = microtime(true) - $this->requestTime;
        
        if ($requestTime < self::MIN_LOGIN_TIME)
            usleep((self::MIN_LOGIN_TIME - $requestTime) * 1000000);
    }
}