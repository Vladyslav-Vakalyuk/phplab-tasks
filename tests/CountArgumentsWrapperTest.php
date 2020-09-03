<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testException($input, $expected)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);
    }

    public function positiveDataProvider()
    {
        return [
            [[1], invalidArgumentException::class],
            [null, InvalidArgumentException::class],
            [function () {
                return 'test';
            }, InvalidArgumentException::class],
        ];
    }


}