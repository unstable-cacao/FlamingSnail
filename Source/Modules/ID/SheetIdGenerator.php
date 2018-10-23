<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class SheetIdGenerator
{
    use TStaticClass;
    
    
    public static function generate(): string
    {
        return IdGenerator::generate(16);
    }
}