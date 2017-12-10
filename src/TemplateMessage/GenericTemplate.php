<?php
/**
 * File: GenericTemplate.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/12/17
 * Time: 18:33
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\TemplateMessage;

use LACCBot\Element\ElementInterface;


class GenericTemplate implements TemplateInterface
{
    protected $products = [];

    protected $containerId;

    public function __construct($containerId)
    {
        $this->containerId = $containerId;
    }

    public function add(ElementInterface $element)
    {
        $this->products[] = $element->get();
    }

    public function message($messageText)
    {
        return [
            'recipient' => [
                'id' => $this->containerId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements' => $this->products
                    ]
                ],
            ]
        ];
    }
}