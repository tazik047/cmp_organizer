<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
class Event extends BaseEntity
{
    //public $id;
    //public $name;
    //public $user;
    //public $event_type;
    //public $startDate;
    //public $endDate;
    //public $description;
    //public $notification;
	
	public function getId(){
        return isset($this->fields[$this->idColumnName])?$this->fields[$this->idColumnName]:"";
    }

    public function setId($id){
        $this->fields[$this->idColumnName] = $id;
    }
	
	public function getName(){
		return isset($this->fields['Name'])?$this->fields['Name']:"";
	}
	
	public function setName($name){
		$this->fields['Name'] = $name;
	}
	
	public function getUserId(){
        return isset($this->fields['UserId'])?$this->fields['UserId']:"";
    }

    public function setUserId($id){
        $this->fields['UserId'] = $id;
    }
	
	public function getEventTypeId(){
        return isset($this->fields['EventTypeId'])?$this->fields['EventTypeId']:"";
    }

    public function setEventTypeId($id){
        $this->fields['EventTypeId'] = $id;
    }
	
	public function getStartDate(){
        return isset($this->fields['StartDate'])?$this->fields['StartDate']:"";
    }

    public function setStartDate($startDate){
        $this->fields['StartDate'] = $startDate;
    }
	
	public function getEndDate(){
        return isset($this->fields['EndDate'])?$this->fields['EndDate']:"";
    }

    public function setEndDate($endDate){
        $this->fields['EndDate'] = $endDate;
    }
	
	public function getDescription(){
        return isset($this->fields['Description'])?$this->fields['Description']:"";
    }

    public function setDescription($description){
        $this->fields['Description'] = $description;
    }
	
	public function getNotification(){
        return isset($this->fields['Notification'])?$this->fields['Notification']:"";
    }

    public function setNotification($notification){
        $this->fields['Notification'] = $notification;
    }
	
	public function __construct(){
        parent::__construct();
        $this->idColumnName = "EventId";
        $this->tableName = "event";
    }

    /*public function __construct($id, $user, $description, $notification, $event_type, $startDate, $endDate, $name){
        $this->user=$user;
        $this->id = $id;
        $this->description = $description;
        $this->notification = $notification;
		$this->event_type = $event_type;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->name = $name;
    }*/
}