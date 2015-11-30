<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
class EventType
{
    public $id;
    public $user;
    public $event_type;
    public $time;

	public $color;

    public function __construct($id, $user, $name, $color){
        $this->user=$user;
        $this->id = $id;
        $this->name = $name;
		$this->color = $color;
    }
}