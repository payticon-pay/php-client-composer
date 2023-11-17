<?php
namespace Paycadoo\clients;
use Paycadoo\HttpClient;
use Paycadoo\models\Subscription;
use Exception;
class SubscriptionClient {
	/**
	* @var HttpClient	
	**/
	protected $httpClient;
	/**
	* @param HttpClient $httpClient	
	**/
	public function __construct(HttpClient $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	/**
	* The Create Order endpoint in a payment system is like the architect laying the foundation for a seamless transaction. This crucial API allows users to initiate a new order, specifying details such as the items being purchased, the amount, and any additional information needed for processing.
	* 
	* Once the order is successfully created, the magic happens—it generates a redirectUrl. This special link serves as a gateway, guiding users to the payment interface where they can fulfill their purchase. It's like a digital usher, ensuring customers reach the right destination effortlessly.
	* 
	* In essence, the Create Order endpoint not only kickstarts the payment process but also hands users the golden ticket in the form of a redirectUrl, paving the way for a smooth and secure payment journey.
	* 
	* @param array{
	*   limit: integer,
	*   offset: integer,
	*   sort_by: "createdAt"|"updatedAt"|"id"|"price",
	*   order_by: "asc"|"desc"
	* } $options
	* @return Subscription[]
	* @throws Exception	
	**/
	public function get(array $options = array()): array
	{
		return Subscription::createList($this->httpClient->get("/api/v1/subscriptions", $options));
	}

	/**
	* The Create Order endpoint in a payment system is like the architect laying the foundation for a seamless transaction. This crucial API allows users to initiate a new order, specifying details such as the items being purchased, the amount, and any additional information needed for processing.
	* 
	* Once the order is successfully created, the magic happens—it generates a redirectUrl. This special link serves as a gateway, guiding users to the payment interface where they can fulfill their purchase. It's like a digital usher, ensuring customers reach the right destination effortlessly.
	* 
	* In essence, the Create Order endpoint not only kickstarts the payment process but also hands users the golden ticket in the form of a redirectUrl, paving the way for a smooth and secure payment journey.
	* 
	* @param string $subscriptionId
	* @return Subscription
	* @throws Exception	
	**/
	public function getById(string $subscriptionId): Subscription
	{
		return Subscription::create($this->httpClient->get("/api/v1/subscriptions/:id"));
	}
}