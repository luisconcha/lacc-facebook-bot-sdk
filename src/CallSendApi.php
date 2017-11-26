<?php
/**
 * File: CallSendApi.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 22:44
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot;

use GuzzleHttp\Client;

class CallSendApi
{
    const URL = 'https://graph.facebook.com/v2.6/me/messages';

    private $pageAccessToken;

    public function __construct($pageAccessToken)
    {
        $this->pageAccessToken = $pageAccessToken;
    }

    public function make(array $message, $url = null, $method = 'POST')
    {
        $client = new Client();
        $url = $url ? $url : CallSendApi::URL;

        $response = $client->request($method, $url, [
            'json' => $message,
            'query' => ['access_token' => $this->pageAccessToken]
        ]);

        return (string)$response->getBody();
    }
}