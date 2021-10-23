<?php

namespace App\Controller;

use App\Core\Config;

class ProductController
{
    public static function getArrayConfig()
    {
        echo Config::get('main', 'version') . PHP_EOL;
        echo Config::get('db', 'host') . PHP_EOL;
    }
}
