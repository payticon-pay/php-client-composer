<?php
/**
* The "refund order" endpoint allows users to initiate a refund process for a previously completed order.
* This functionality is crucial for handling customer returns, cancellations, or resolving payment discrepancies.
*  
* The endpoint requires specific parameters to be included in the request payload, such as the order ID and refund amount.
* **/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->order->refund();