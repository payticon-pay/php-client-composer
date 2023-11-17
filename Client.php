<?php
namespace Paycadoo;
use Paycadoo\clients\OrderClient;
use Paycadoo\clients\RefundClient;
use Paycadoo\clients\SubscriptionClient;

class Client {
	/**
	* @var OrderClient	
	**/
	public $order;
	/**
	* @var RefundClient	
	**/
	public $refund;
	/**
	* @var SubscriptionClient	
	**/
	public $subscription;
	/**
	* @param string $apiKey
	* @param string $url	
	**/
	public function __construct(string $apiKey, string $url = "https://pay.payticon.com")
	{
		$httpClient = new HttpClient($url, $apiKey);
		$this->order = new OrderClient($httpClient);
		$this->refund = new RefundClient($httpClient);
		$this->subscription = new SubscriptionClient($httpClient);
		
	}
}