<?php
/**
 * File: ButtonsTemplateTest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/11/17
 * Time: 19:22
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\TemplateMessage;

use LACCBot\Element\Button;
use PHPUnit\Framework\TestCase;

class ButtonsTemplateTest extends TestCase
{
    public function testReturnWithButtonInArrayFormat()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('postback', 'Que tal uma respota do bot?', 'resposta'));
        $actual = $buttonsTemplate->message('Olha um exemplo de template com botões');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Olha um exemplo de template com botões',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'Que tal uma respota do bot?',
                                'payload' => 'resposta',
                            ]
                        ]
                    ]
                ],
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}