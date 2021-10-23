<?php

namespace App\Controller;

use App\Core\Config;

class OrderController
{
    public static function getArrayConfig()
    {
        echo Config::get('main', 'version') . PHP_EOL;
        echo Config::get('db', 'host') . PHP_EOL;
    }
}
