<?php
/**
 * File: Message.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/11/17
 * Time: 20:28
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Message;


interface Message
{

    public function __construct($containerId);

    public function message($messageText);
}