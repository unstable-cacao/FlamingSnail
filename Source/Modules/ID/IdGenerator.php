<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class IdGenerator
{
    use TStaticClass;
    
    
    public static function generate(int $length, bool $alphanumeric = true): string
    {
        $encoded = base64_encode(random_bytes($length));
        
        if ($alphanumeric) 
        {
            $encoded = str_replace(['/', '+', '='], '', $encoded);
        }
        
        return substr($encoded, 0, $length);
    }
}