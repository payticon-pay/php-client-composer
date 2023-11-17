<?php
/**
* The Create Order endpoint in a payment system is like the architect laying the foundation for a seamless transaction. This crucial API allows users to initiate a new order, specifying details such as the items being purchased, the amount, and any additional information needed for processing.
* 
* Once the order is successfully created, the magic happens—it generates a redirectUrl. This special link serves as a gateway, guiding users to the payment interface where they can fulfill their purchase. It's like a digital usher, ensuring customers reach the right destination effortlessly.
* 
* In essence, the Create Order endpoint not only kickstarts the payment process but also hands users the golden ticket in the form of a redirectUrl, paving the way for a smooth and secure payment journey.
* 
**/

use Paycadoo\Client;

$client = new Client("<YOUR_API_KEY>");
$client->subscription->get();