<?php

namespace App\Core;

use Exception;

/**
 * Класс для работы с конфигурационными файлами.
 */
class Config
{
    /**
     * Хранит параметры всех конфигурационных файловю
     *
     * @var array|null
     */
    private static ?array $configs = null;

    /**
     * Производит чтение конфигурационных файлов.
     * Реализован паттерн {Синглтон}.
     *
     * @param string $configName
     *
     * @return object
     */
    private static function init(string $configName): object
    {
        if (empty(self::$configs[$configName])) {
            $filePath = PROJECT_DIR . '/config/' . $configName . '.php';

            if (!file_exists($filePath)) {
                throw new Exception('Не найден файл конфигурации {' . $configName . '}');
            }

            self::$configs[$configName] = (object) require_once $filePath;
        }

        return self::$configs[$configName];
    }

    /**
     * Возвращает данные из конфигурационного файла по ключу.
     *
     * @param string $configName
     * @param string $key
     * 
     * @return mixed
     */
    public static function get(string $configName, string $key)
    {
        self::init($configName);

        if (isset(self::$configs[$configName]->$key)) {
            return self::$configs[$configName]->$key;
        }

        throw new Exception('Отсутсвует параметр {' . $key . '}');
    }

    /**
     * Добавляет параметр или перезаписывает существующий.
     *
     * @param string $configName
     * @param string $key
     * @param mixed  $value
     */
    public static function set(string $configName, string $key, $value)
    {
        self::init($configName);

        self::$configs[$configName]->$key = $value;
    }
}
