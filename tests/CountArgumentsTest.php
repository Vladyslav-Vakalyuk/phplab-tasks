<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, countArguments($input));
    }

    public function positiveDataProvider()
    {
        return [
            [[1, 2, 3], [
                'argument_count' => 1,
                'argument_values' => [[1, 2, 3]],
            ]],
        ];
    }


}