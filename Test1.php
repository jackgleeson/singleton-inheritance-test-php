<?php

/**
 * The test below consists of the following
 *
 * - Singleton base class (typical static keyword implementation)
 * - First class extending Singleton Base Class (to test two-tier inheritance - parent/child)
 * - Second class extending First class (to test three-tier hierarchy - parent/child/child)
 *
 * The test fails.
 *
 * Code output is:
 *
string(28) "Singleton: Mr Base Singleton"
string(28) "Singleton: Mr Base Singleton"
string(28) "Singleton: Mr Base Singleton"
 *
 *
 * The issue is not related to late static binding. It's due to a limitation in the default design resulting in calls to
 * getInstance() only returning the first instance occupying this property, due to the !isset check on line 30.
 */


class Singleton
{
    protected static $instance = null;

    public $name;

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
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


