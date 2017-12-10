<?php
/**
 * File: GenericTemplateTest.php
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
use LACCBot\Element\Product;
use PHPUnit\Framework\TestCase;

class GenericTemplateTest extends TestCase
{
    public function testListWithTwoProduct()
    {
        $button = new Button('web_url', '', 'https://www.youtube.com/watch?v=-7xYdgCS_nU');
        $product = new Product('produto 01', 'https://i.pinimg.com/736x/6e/99/6d/6e996d0e4a9e59e49400b50c0dcffbb0--thundercats-internet.jpg', 'thundercats', $button);

        $button2 = new Button('web_url', '', 'https://www.youtube.com/watch?v=-7xYdgCS_nU');
        $product2 = new Product('produto 02', 'https://www.cinemascomics.com/wp-content/uploads/2011/08/cabeza_mazinger_z.jpg', 'Mazinger z', $button2);


        $template = new GenericTemplate(1234);
        $template->add($product);
        $template->add($product2);

        $actual = $template->message('qwe');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'buttons' => [
                            [
                                'title' => 'produto 01',
                                'subtitle' => 'thundercats',
                                'image_url' => 'https://i.pinimg.com/736x/6e/99/6d/6e996d0e4a9e59e49400b50c0dcffbb0--thundercats-internet.jpg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'https://www.youtube.com/watch?v=-7xYdgCS_nU',
                                ],
                            ],
                            [
                                'title' => 'produto 02',
                                'subtitle' => 'Mazinger z',
                                'image_url' => 'https://www.cinemascomics.com/wp-content/uploads/2011/08/cabeza_mazinger_z.jpg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'https://www.youtube.com/watch?v=-7xYdgCS_nU',
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}