<?php
/**
* This endpoint allows you to retrieve a list of orders within the payment system.
*  It provides flexibility through various query parameters to tailor the results according to your needs.
* 
**/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->order->get();