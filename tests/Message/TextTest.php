<?php
/**
 * File: TextTest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 20:30
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Message;

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testReturnsAnArray()
    {
        $actual = (new Text(1))->message('Olá testando');
        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'Olá testando',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];

        $this->assertEquals($actual, $expected);
    }
}