<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
            [[['name' => 'ABR']], ['A']],
            [[['name' => 'BRB']], ['B']],
            [[['name' => 'CRB']], ['C']],
        ];
    }


}