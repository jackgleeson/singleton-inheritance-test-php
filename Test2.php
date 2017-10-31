<?php

/**
 * The test code below consists of the following
 *
 * - Singleton base class (implementation using static keyword, instances array and PHP 5.3+ get_called_class())
 * - First class extending Singleton Base Class (to test two-tier inheritance - parent/child)
 * - Second class extending First child class (to test three-tier hierarchy - parent/child/child)
 *
 * The test passes.
 *
 * Code output is:
 *
string(28) "Singleton: Mr Base Singleton"
string(26) "First: Mrs First Singleton"
string(27) "Second: Dr Second Singleton"
 *
 */


class Singleton
{
    protected static $instances = [];

    public $name;

    public static function getInstance()
    {
        $class = get_called_class(); // late-static-bound class name
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static;
        }
        return self::$instances[$class];
    }

    public function whatsMyName()
    {
        return get_class() . ": Mr Base Singleton";
    }
}

class First extends Singleton
{

    public function whatsMyName()
    {
        return get_class() . ": Mrs First Singleton";
    }

}

class Second extends First
{

    public function whatsMyName()
    {
        return get_class() . ": Dr Second Singleton";
    }
}


$Base = Singleton::getInstance();
$First = First::getInstance();
$Second = Second::getInstance();

var_dump($Base->whatsMyName());
var_dump($First->whatsMyName());
var_dump($Second->whatsMyName());

?>


