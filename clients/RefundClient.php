<?php
namespace Paycadoo\clients;
use Paycadoo\HttpClient;
use Paycadoo\models\Refund;
use Exception;

class RefundClient {
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
	* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
	* To use this endpoint, simply provide the appropriate order ID as a route parameter.
	* 
	* @param string $refundId
	* @return Refund
	* @throws Exception	
	**/
	public function getById(string $refundId): Refund
	{
		return Refund::create($this->httpClient->get("/api/v1/refunds/$refundId"));
	}
}