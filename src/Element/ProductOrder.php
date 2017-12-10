<?php
/**
 * File: ProductOrder.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/12/17
 * Time: 20:01
 * Project: 3_chatbooks_laravel
 * Copyright: 2017
 */

namespace LACCBot\Element;


class ProductOrder implements ElementInterface
{
    private $title;
    private $subtitle;
    private $quantity;
    private $price;
    private $currency;
    private $image_url;

    public function __construct($title, $subtitle, $quantity = null, $price = 0, $currency = null, $image_url = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->currency = $currency;
        $this->image_url = $image_url;
    }


    public function get()
    {
        $result['title'] = $this->title;
        $result['subtitle'] = $this->subtitle;
        $result['price'] = $this->price;

        if ($this->quantity !== null) {
            $result['quantity'] = $this->quantity;
        }

        if ($this->currency !== null) {
            $result['currency'] = $this->currency;
        }

        if ($this->image_url !== null) {
            $result['image_url'] = $this->image_url;
        }

        return $result;
    }

}