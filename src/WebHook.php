<?php
/**
 * File: WebHook.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/11/17
 * Time: 00:14
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot;


class WebHook
{
    public function check($token)
    {
        $hubMode = filter_input(INPUT_GET, 'hub_mode');
        $hubVerifyToken = filter_input(INPUT_GET, 'hub_verify_token');

        if ($hubMode === 'subscribe' and $hubVerifyToken === $token) {
            return filter_input(INPUT_GET, 'hub_challenge');
        }

        return false;
    }
}