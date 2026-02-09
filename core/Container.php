<?php

final class Container {

    private static $services = [];

    private function __construct() {}

    public static function get(string $key):mixed {
        if (!self::has($key)) {
            throw new RuntimeException('The requested property ('.$key.') has not been set.', 500);
        }
        return self::$services[$key];
    }

    public static function set(string $key, &$value):void {
        self::$services[$key] = &$value;
    }

    public static function has(string $key):bool {
        return array_key_exists($key, self::$services);
    }

    public static function unset(string $key):void {
        unset(self::$services[$key]);
    }

    public static function __callStatic($name, $arguments) {
        return self::get($name);
    }
}

?>