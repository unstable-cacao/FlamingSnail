<?php
namespace FlamingSnail\Controllers;


class ControllerDecorator
{
    public function before()
    {
        echo 1; die;
    }
}