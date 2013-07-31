<?php

use yiistrapunit\TestCase;
use yiistrap\helpers\ArrayHelper;

class ArrayHelperTest extends TestCase
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testPopValue()
    {
        $array = array('key' => 'value');
        $this->assertEquals('value', ArrayHelper::popValue($array, 'key'));
        $this->assertArrayNotHasKey('key', $array);

        $object = new stdClass();
        $object->key = 'value';
        $this->assertEquals('value', ArrayHelper::popValue($object, 'key'));
        $this->assertObjectNotHasAttribute('key', $object);
    }

    public function testDefaultValue()
    {
        $array = array();
        ArrayHelper::defaultValue($array, 'key', 'default');
        $this->assertEquals('default', ArrayHelper::getValue($array, 'key'));
        ArrayHelper::defaultValue($array, 'key', 'value');
        $this->assertEquals('default', ArrayHelper::getValue($array, 'key'));

        $object = new stdClass();
        ArrayHelper::defaultValue($object, 'key', 'default');
        $this->assertEquals('default', ArrayHelper::getValue($object, 'key'));
        ArrayHelper::defaultValue($object, 'key', 'value');
        $this->assertEquals('default', ArrayHelper::getValue($object, 'key'));
    }

    public function testDefaultValues()
    {
        $array = array('my' => 'value');
        ArrayHelper::defaultValues($array, array('these' => 'are', 'my' => 'defaults'));
        $this->assertEquals('are', ArrayHelper::getValue($array, 'these'));
        $this->assertEquals('value', ArrayHelper::getValue($array, 'my'));
    }

    public function testRemoveValues()
    {
        $array = array('these' => 'are', 'my' => 'values');
        ArrayHelper::removeValues($array, array('these', 'my'));
        $this->assertArrayNotHasKey('these', $array);
        $this->assertArrayNotHasKey('my', $array);
    }

    public function testCopyValues()
    {
        $a = array('key' => 'value');
        $b = array();
        $array = ArrayHelper::copyValues(array('key'), $a, $b);
        $this->assertEquals($a, $array);
        $a = array('key' => 'value');
        $b = array('key' => 'other');
        $array = ArrayHelper::copyValues(array('key'), $a, $b, true);
        $this->assertEquals($a, $array);
    }

    public function testMoveValues()
    {
        $a = array('key' => 'value');
        $b = array();
        $array = ArrayHelper::moveValues(array('key'), $a, $b);
        $this->assertArrayNotHasKey('key', $a);
        $this->assertEquals('value', ArrayHelper::getValue($array, 'key'));
        $a = array('key' => 'value');
        $b = array('key' => 'other');
        $array = ArrayHelper::moveValues(array('key'), $a, $b, true);
        $this->assertEquals('value', ArrayHelper::getValue($array, 'key'));
    }
}