<?php
/**
 * File: TemplateInterface.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/11/17
 * Time: 18:39
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\TemplateMessage;

use LACCBot\Element\ElementInterface;
use LACCBot\Message\Message;

interface TemplateInterface extends Message
{
    public function add(ElementInterface $element);

}