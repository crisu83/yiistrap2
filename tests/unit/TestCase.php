<?php

namespace yiistrapunit;

class TestCase extends \Codeception\TestCase\Test
{
    protected function _after()
    {
        $this->destroyApplication();
    }

    protected function mockApplication($config = array(), $appClass = '\yii\console\Application')
    {
        static $defaultConfig = array(
            'id' => 'testapp',
            'basePath' => __DIR__,
        );

        new $appClass(array_merge($defaultConfig, $config));
    }

    protected function destroyApplication()
    {
        \Yii::$app = null;
    }
}