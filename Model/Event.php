<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
class Event
{
    public $id;
    public $name;
    public $user;
    public $event_type;
    public $startDate;
    public $endDate;
    public $description;
    public $notification;

    public function __construct($id, $user, $description, $notification, $event_type, $startDate, $endDate, $name){
        $this->user=$user;
        $this->id = $id;
        $this->description = $description;
        $this->notification = $notification;
		$this->event_type = $event_type;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->name = $name;
    }
}