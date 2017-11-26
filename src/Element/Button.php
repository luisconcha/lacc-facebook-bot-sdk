<?php
/**
 * File: Button.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/11/17
 * Time: 18:57
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Element;


class Button implements ElementInterface
{
    private $title;
    private $type;
    private $value;
    private $config;

    public function __construct($type, $title = null, $value = null, array $config = [])
    {
        $this->title = $title;
        $this->type = $type;
        $this->value = $value;
        $this->config = $config;
    }

    public function get()
    {
        $data = [
            'type' => $this->type,
        ];

        if ($this->title !== null and is_string($this->title)) {
            $data['title'] = $this->title;
        }

        if (is_string($this->type)) {

            if ($this->type === 'web_url') {
                $data['url'] = $this->value;
            }

            if ($this->type === 'postback' or $this->type === 'phone_number') {
                $data['payload'] = $this->value;
            }

            if ($this->type === 'share_contents') {
                if ($this->value) {
                    $data['share_contents'] = $this->value;
                }

                //Como no share_content já existem o titulo como padrão, temos que remover para não dar erro
                unset($this->title);
            }
        }


        return array_merge($data, $this->config);
    }
}