<?php
/**
 * File: Image.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 22:00
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Message;


class Image implements Message
{
    private $containerId;

    public function __construct($containerId)
    {
        $this->containerId = $containerId;
    }

    public function message($messageText)
    {
        return [
            'recipient' => [
                'id' => $this->containerId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'image',
                    'payload' => [
                        'url' => $messageText
                    ]
                ],
            ]
        ];
    }
}