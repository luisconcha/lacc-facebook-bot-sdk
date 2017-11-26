<?php
/**
 * File: SenderRequest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 23:04
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot;


class SenderRequest
{
    private $event;

    public function __construct()
    {
        $event = file_get_contents("php://input");
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING);
        $this->event = $event['entry'][0]['messaging'][0];
    }

    public function getSenderId()
    {
        return ($this->event['sender']['id']) ? $this->event['sender']['id'] : null;
    }

    public function getMessage()
    {
        return ($this->event['message']['text']) ? $this->event['message']['text'] : null;
    }

    public function getPostback()
    {
        if (empty($this->event['postback'])) {
            return null;
        }

        if (is_array($this->event['postback']) and !empty($this->event['postback']['payload'])) {
            return $this->event['postback']['payload'];
        }

        return ($this->event['postback']) ? $this->event['postback'] : null;
    }
}