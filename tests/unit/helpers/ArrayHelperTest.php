<?php

namespace yiistrap\tests\unit\helpers;

use yiistrap\helpers\ArrayHelper;
use yiistrap\tests\unit\TestCase;

class ArrayHelperTest extends TestCase
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    public function testPopValue()
    {
        $array = array('key' => 'value');
        $this->assertEquals('value', ArrayHelper::popValue($array, 'key'));
        $this->assertArrayNotHasKey('key', $array);

        $object = new \stdClass();
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

        $object = new \stdClass();
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

    public function testCopyValue()
    {
        $a = array('key' => 'value');
        $b = array();
        ArrayHelper::copyValue('key', $a, $b);
        $this->assertArrayHasKey('key', $a);
        $this->assertEquals('value', ArrayHelper::getValue($b, 'key'));
        $a = array('key' => 'value');
        $b = array('key' => 'other');
        ArrayHelper::copyValue('key', $a, $b, true);
        $this->assertEquals('value', ArrayHelper::getValue($b, 'key'));
    }

    public function testCopyValues()
    {
        $a = array('key' => 'iron', 'door' => 'wooden');
        $b = array();
        ArrayHelper::copyValues(array('key', 'door'), $a, $b);
        $this->assertArrayHasKey('key', $a);
        $this->assertArrayHasKey('door', $a);
        $this->assertEquals('iron', ArrayHelper::getValue($b, 'key'));
        $this->assertEquals('wooden', ArrayHelper::getValue($b, 'door'));
        $a = array('key' => 'iron', 'door' => 'wooden');
        $b = array('key' => 'steel', 'door' => 'glass');
        ArrayHelper::copyValues(array('key', 'door'), $a, $b, true);
        $this->assertEquals('iron', ArrayHelper::getValue($b, 'key'));
        $this->assertEquals('wooden', ArrayHelper::getValue($b, 'door'));
    }

    public function testMoveValue()
    {
        $a = array('key' => 'value');
        $b = array();
        ArrayHelper::moveValue('key', $a, $b);
        $this->assertArrayNotHasKey('key', $a);
        $this->assertEquals('value', ArrayHelper::getValue($b, 'key'));
        $a = array('key' => 'value');
        $b = array('key' => 'other');
        ArrayHelper::moveValue('key', $a, $b, true);
        $this->assertEquals('value', ArrayHelper::getValue($b, 'key'));
    }

    public function testMoveValues()
    {
        $a = array('key' => 'iron', 'door' => 'wooden');
        $b = array();
        ArrayHelper::moveValues(array('key', 'door'), $a, $b);
        $this->assertArrayNotHasKey('key', $a);
        $this->assertArrayNotHasKey('door', $a);
        $this->assertEquals('iron', ArrayHelper::getValue($b, 'key'));
        $this->assertEquals('wooden', ArrayHelper::getValue($b, 'door'));
        $a = array('key' => 'iron', 'door' => 'wooden');
        $b = array('key' => 'steel', 'door' => 'glass');
        ArrayHelper::moveValues(array('key', 'door'), $a, $b, true);
        $this->assertEquals('iron', ArrayHelper::getValue($b, 'key'));
        $this->assertEquals('wooden', ArrayHelper::getValue($b, 'door'));
    }
}