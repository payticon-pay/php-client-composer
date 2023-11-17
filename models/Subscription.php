<?php
namespace Paycadoo\models;

class Subscription {
	/**
	* @var string	**/
	public $id;
	/**
	* @var string	**/
	public $title;
	/**
	* @var string	**/
	public $customerId;
	/**
	* @var boolean	**/
	public $isActive;
	/**
	* @var string	**/
	public $lastBillingDate;
	/**
	* @var string	**/
	public $currentBillingDate;
	/**
	* @var string	**/
	public $interval;
	/**
	* @var string	**/
	public $webhookUrl;
	/**
	* @var array	**/
	public $items;
	/**
	* @param array $array
	* @return self	**/
	public static function create(array $array): self
	{
		$model = new self();
		$model->id = $array["id"];
		$model->title = $array["title"];
		$model->customerId = $array["customerId"];
		$model->isActive = $array["isActive"];
		$model->lastBillingDate = $array["lastBillingDate"];
		$model->currentBillingDate = $array["currentBillingDate"];
		$model->interval = $array["interval"];
		$model->webhookUrl = $array["webhookUrl"];
		$model->items = SubscriptionItem::createList($array["items"]);
		
		return $model;
	}

	/**
	* @param array $array
	* @return self[]	**/
	public static function createList(array $array): array
	{
		$list = array();
		foreach ($array as $item) {
			$list[] = self::create($item);
		}
		
		return $list;
	}
}