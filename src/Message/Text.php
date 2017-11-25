<?php
/**
 * File: Text.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 20:28
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Message;


class Text
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
                'text' => $messageText,
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}