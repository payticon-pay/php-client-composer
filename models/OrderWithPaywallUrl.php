<?php
namespace Paycadoo\models;

class OrderWithPaywallUrl {
	/**
	* @var string	
	**/
	public $id;
	/**
	* @var string	
	**/
	public $status;
	/**
	* @var string	
	**/
	public $merchantId;
	/**
	* @var string	
	**/
	public $webhookUrl;
	/**
	* @var string	
	**/
	public $createdAt;
	/**
	* @var string	
	**/
	public $updatedAt;
	/**
	* @var integer	
	**/
	public $price;
	/**
	* @var boolean	
	**/
	public $canBeRefunded;
	/**
	* @var string	
	**/
	public $currency;
	/**
	* @var object	
	**/
	public $customer;
	/**
	* @var string	
	**/
	public $title;
	/**
	* @var array	
	**/
	public $items;
	/**
	* @var string	
	**/
	public $paywallUrl;
	/**
	* @param array $array
	* @return self	
	**/
	public static function create(array $array): self
	{
		$model = new self();
		$model->id = $array["id"];
		$model->status = $array["status"];
		$model->merchantId = $array["merchantId"];
		$model->webhookUrl = $array["webhookUrl"];
		$model->createdAt = $array["createdAt"];
		$model->updatedAt = $array["updatedAt"];
		$model->price = $array["price"];
		$model->canBeRefunded = $array["canBeRefunded"];
		$model->currency = $array["currency"];
		$model->customer = Customer::create($array["customer"]);
		$model->title = $array["title"];
		$model->items = OrderItem::createList($array["items"]);
		$model->paywallUrl = $array["paywallUrl"];
		
		return $model;
	}

	/**
	* @param array $array
	* @return self[]	
	**/
	public static function createList(array $array): array
	{
		$list = array();
		foreach ($array as $item) {
			$list[] = self::create($item);
		}
		
		return $list;
	}
}