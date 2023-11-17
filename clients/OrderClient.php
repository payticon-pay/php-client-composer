<?php
namespace Paycadoo\clients;
use Paycadoo\HttpClient;
use Paycadoo\models\OrderWithPaywallUrl;
use Paycadoo\models\Order;
use Paycadoo\models\Refund;
use Exception;

class OrderClient {
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
	* @param array{
	*   price: integer,
	*   merchantId: string,
	*   title: string,
	*   currency: "AUD"|"BGN"|"CAD"|"CHF"|"CZK"|"DKK"|"EUR"|"GBP"|"HRK"|"HUF"|"JPY"|"LTL"|"NOK"|"PLN"|"ROL"|"RUR"|"SEK"|"TRL"|"UAH"|"USD",
	*   returnUrl: string,
	*   webhookUrl: string,
	*   customer: array{
	*     id: string,
	*     firstName: string,
	*     lastName: string,
	*     email: string
	*   },
	*   items: list{
	*     array{
	*       name: string,
	*       qty: integer,
	*       price: integer
	*     }
	*   }
	* } $data
	* @return OrderWithPaywallUrl
	* @throws Exception	
	**/
	public function create(array $data): OrderWithPaywallUrl
	{
		return OrderWithPaywallUrl::create($this->httpClient->post("/api/v1/orders", $data));
	}

	/**
	* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
	* To use this endpoint, simply provide the appropriate order ID as a route parameter.
	* 
	* @param string $orderId
	* @return Order
	* @throws Exception	
	**/
	public function getById(string $orderId): Order
	{
		return Order::create($this->httpClient->get("/api/v1/orders/$orderId"));
	}

	/**
	* This endpoint allows you to retrieve a list of orders within the payment system.
	*  It provides flexibility through various query parameters to tailor the results according to your needs.
	* 
	* @param array{
	*   limit: integer,
	*   offset: integer,
	*   sort_by: "createdAt"|"amount"|"updatedAt",
	*   order_by: "asc"|"desc"
	* } $options
	* @return Order[]
	* @throws Exception	
	**/
	public function get(array $options = array()): array
	{
		return Order::createList($this->httpClient->get("/api/v1/orders", $options));
	}

	/**
	* The "refund order" endpoint allows users to initiate a refund process for a previously completed order.
	* This functionality is crucial for handling customer returns, cancellations, or resolving payment discrepancies.
	*  
	* The endpoint requires specific parameters to be included in the request payload, such as the order ID and refund amount.
	* 
	* @param string $orderId
	* @param array{
	*   amount: integer,
	*   reason: string
	* } $data
	* @return Refund[]
	* @throws Exception	
	**/
	public function refund(string $orderId, array $data): array
	{
		return Refund::createList($this->httpClient->post("/api/v1/orders/$orderId/refund", $data));
	}

	/**
	* The "List Order Refunds" endpoint provides a comprehensive overview of all refunds associated with specific orders within the payment system. 
	* This functionality is crucial for merchants and administrators seeking detailed insights into the refund history of individual transactions..
	* 
	* @param string $orderId
	* @param array{
	*   limit: integer,
	*   offset: integer,
	*   sort_by: "createdAt",
	*   order_by: "asc"|"desc"
	* } $options
	* @return Refund[]
	* @throws Exception	
	**/
	public function getRefunds(string $orderId, array $options = array()): array
	{
		return Refund::createList($this->httpClient->get("/api/v1/orders/$orderId/refund", $options));
	}
}