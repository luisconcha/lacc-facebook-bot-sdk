<?php
/**
 * File: CallSendApiTest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 22:57
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot;

use LACCBot\Message\Text;
use PHPUnit\Framework\TestCase;

class CallSendApiTest extends TestCase
{
    /** @expectedException \GuzzleHttp\Exception\ClientException */
    public function testMakeRequest()
    {
        $message = (new Text(1))->message('Olá testando');
        (new CallSendApi('123ghSSW63'))->make($message);
    }

}