<?php
namespace FlamingSnail\Web\Decorators;


class ControllerDecorator
{
    public function before()
    {
        echo 1; die;
    }
}