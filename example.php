<?php

use App\Controller\OrderController;
use App\Controller\ProductController;

const PROJECT_DIR = __DIR__ . '/';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require PROJECT_DIR . '/vendor/autoload.php';

/**
 * Пример вызова методов контроллеров в которых получаем параметры с конфигурационных файлов.
 * Не зависимо от того, сколько раз мы будем вызывать данные методы или сколько раз
 * обращаться к параметрам конфигурационных файлов, их вызов и чтение всегда будет только один раз.
 * 
 * Реализация паттерна {Синглтон}.
 */

OrderController::getArrayConfig();
ProductController::getArrayConfig();
