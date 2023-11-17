<?php
/**
* The "List Order Refunds" endpoint provides a comprehensive overview of all refunds associated with specific orders within the payment system. 
* This functionality is crucial for merchants and administrators seeking detailed insights into the refund history of individual transactions..
* 
**/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->order->getRefunds("134492fe-fd5e-41ff-b477-8a8cec68fa93", [
  'limit' => 15,
  'offset' => 20,
  'order_by' => 'desc',
  'sort_by' => 'createdAt'
]);