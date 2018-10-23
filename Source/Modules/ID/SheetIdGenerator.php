<?php
namespace FlamingSnail\Modules\ID;


use Traitor\TStaticClass;


class SheetIdGenerator
{
    use TStaticClass;
    
    
    public static function generate(): string
    {
        return 'sht' . IdGenerator::generate(13);
    }
}