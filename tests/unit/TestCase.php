<?php

namespace yiistrap\tests\unit;

use yii\codeception\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function _before()
    {
        $this->appConfig = array(
            'id' => 'yiistrap-test',
            'basePath' => dirname(__DIR__),
            'class' => \yii\console\Application::className(),
        );
        $this->mockApplication();
    }
} 