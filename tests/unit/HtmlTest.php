<?php

use yiistrapunit\TestCase;

class HtmlTest extends TestCase
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
        $this->mockApplication();
    }
}