<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            ['One', 'Hello One'],
            ['Two', 'Hello Two'],
            ['Three', 'Hello Three'],
            ['World', 'Hello World'],
        ];
    }


}