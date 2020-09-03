<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testException($input, $expected)
    {
        $this->expectException(InvalidArgumentException::class);
        sayHelloArgumentWrapper($input);
    }

    public function positiveDataProvider()
    {
        return [
            [[], invalidArgumentException::class],
            [null, InvalidArgumentException::class],
            [function () {
                return 'test';
            }, InvalidArgumentException::class],
        ];
    }


}