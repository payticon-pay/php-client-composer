<?php
namespace Paycadoo\models;

class SubscriptionItem {
	/**
	* @var string	
	**/
	public $id;
	/**
	* @var boolean	
	**/
	public $isActive;
	/**
	* @var boolean	
	**/
	public $isPaused;
	/**
	* @var string	
	**/
	public $productId;
	/**
	* @var object	
	**/
	public $details;
	/**
	* @var string	
	**/
	public $deletedAt;
	/**
	* @var string	
	**/
	public $createdAt;
	/**
	* @param array $array
	* @return self	
	**/
	public static function create(array $array): self
	{
		$model = new self();
		$model->id = $array["id"];
		$model->isActive = $array["isActive"];
		$model->isPaused = $array["isPaused"];
		$model->productId = $array["productId"];
		$model->details = $array["details"];
		$model->deletedAt = $array["deletedAt"];
		$model->createdAt = $array["createdAt"];
		
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