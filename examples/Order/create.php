<?php
/**
* The Create Order endpoint in a payment system is like the architect laying the foundation for a seamless transaction. 
* This crucial API allows users to initiate a new order, specifying details such as the items being purchased, 
* the amount, and any additional information needed for processing.
* Once the order is successfully created, the magic happens—it generates a paywallUrl. 
* 
* This special link serves as a gateway, guiding users to the payment interface where they can fulfill their purchase. 
* It's like a digital usher, ensuring customers reach the right destination effortlessly.
* 
* In essence, the Create Order endpoint not only kickstarts the payment process
* but also hands users the golden ticket in the form of a paywallUrl,
* paving the way for a smooth and secure payment journey.
* 
**/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->order->create([
  'price' => 1000,
  'merchantId' => 'my-order-1',
  'title' => 'My order 1',
  'currency' => 'PLN',
  'returnUrl' => 'https://your-site.com/thank-you',
  'webhookUrl' => 'https://your-site.com/webhook',
  'customer' => [
    'id' => '1',
    'firstName' => 'Joe',
    'lastName' => 'Doe',
    'email' => 'joe.doe@example.com'
  ],
  'items' => [
    [
      'name' => 'Test shirt',
      'price' => 1000,
      'qty' => 1
    ]
  ]
]);