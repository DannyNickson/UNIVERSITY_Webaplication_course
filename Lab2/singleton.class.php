<?php

class Singleton
{
    private static $instances = [];

    protected function __construct()
    {
    }
    protected function __clone()
    {
    }
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        $currentClass = static::class;
        if (!isset(self::$instances[$currentClass])) {
            self::$instances[$currentClass] = new self();
        }
        return self::$instances[$currentClass];
    }
}
