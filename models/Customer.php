<?php
namespace Paycadoo\models;

class Customer {
	/**
	* @var string	
	**/
	public $id;
	/**
	* @var string	
	**/
	public $firstName;
	/**
	* @var string	
	**/
	public $lastName;
	/**
	* @var string	
	**/
	public $email;
	/**
	* @param array $array
	* @return self	
	**/
	public static function create(array $array): self
	{
		$model = new self();
		$model->id = $array["id"];
		$model->firstName = $array["firstName"];
		$model->lastName = $array["lastName"];
		$model->email = $array["email"];
		
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