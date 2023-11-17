<?php
/**
* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
* To use this endpoint, simply provide the appropriate order ID as a route parameter.
* **/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->order->getById("f785f111-3753-4acb-bd37-b001196bf1b7");