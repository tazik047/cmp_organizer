<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
namespace Model;

class EventType extends BaseEntity
{
    public $id;
    public $user;
    public $name;
	public $color;

    public function __construct($id, $user, $name, $color){
        $this->user=$user;
        $this->id = $id;
        $this->name = $name;
		$this->color = $color;
    }
}