<?php
namespace Paycadoo\models;

class OrderItem {
	/**
	* @var string	**/
	public $id;
	/**
	* @var string	**/
	public $name;
	/**
	* @var integer	**/
	public $qty;
	/**
	* @var integer	**/
	public $price;
	/**
	* @param array $array
	* @return self	**/
	public static function create(array $array): self
	{
		$model = new self();
		$model->id = $array["id"];
		$model->name = $array["name"];
		$model->qty = $array["qty"];
		$model->price = $array["price"];
		
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