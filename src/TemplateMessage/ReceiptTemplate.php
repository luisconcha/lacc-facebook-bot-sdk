<?php
/**
 * File: ReceiptTemplate.php
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

class ReceiptTemplate implements TemplateInterface
{
    protected $products = [];

    protected $containerId;
    protected $orderInfo;
    protected $address;
    protected $summary;
    protected $adjustments;

    public function __construct($containerId)
    {
        $this->containerId = $containerId;
    }

    public function add(ElementInterface $element)
    {
        $this->products[] = $element->get();
    }


    public function setOrderInfo($recipient_name, $order_number, $currency, $payment_method, $order_url, $timestamp)
    {
        $this->orderInfo = [
            'recipient_name' => $recipient_name,
            'order_number' => $order_number,
            'currency' => $currency,
            'payment_method' => $payment_method,
            'order_url' => $order_url,
            'timestamp' => $timestamp,
        ];
    }

    public function setAddress($street_1, $street_2, $city, $postal_code, $state, $country)
    {
        $this->address = [
            'street_1' => $street_1,
            'street_2' => $street_2,
            'city' => $city,
            'postal_code' => $postal_code,
            'state' => $state,
            'country' => $country,
        ];
    }

    public function setAdjustments($name, $amount)
    {
        $this->adjustments[] = [
            'name' => $name,
            'amount' => $amount
        ];
    }

    public function setSummary($total_cost, $subtotal = null, $shipping_cost = null, $total_tax = null)
    {
        $this->summary = [
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping_cost,
            'total_tax' => $total_tax,
            'total_cost' => $total_cost,
        ];
    }

    public function message($messageText)
    {
        if ($this->orderInfo !== null) {
            throw new \Exception('orderInfo is required');
        }

        if ($this->summary !== null) {
            throw new \Exception('summary is required');
        }

        return [
            'recipient' => [
                'id' => $this->containerId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'receipt',
                        'text' => $messageText,
                        'recipient_name' => $this->orderInfo['recipient_name'],
                        'order_number' => $this->orderInfo['order_number'],
                        'currency' => $this->orderInfo['currency'],
                        'payment_method' => $this->orderInfo['payment_method'],
                        'order_url' => $this->orderInfo['order_url'],
                        'timestamp' => $this->orderInfo['timestamp'],
                        'elements' => $this->products,
                        'summary' => $this->summary
                    ]
                ],
            ]
        ];
        
        if ($this->address !== null) {
            $result['message']['attachment']['payload']['address'] = $this->address;
        }

        if ($this->adjustments !== null) {
            $result['message']['attachment']['payload']['adjustments'] = $this->adjustments;
        }

        return $result;
    }
}