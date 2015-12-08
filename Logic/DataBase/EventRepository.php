<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:17
 */
class EventRepository
{
    var $db;
	var $userRepo;
	var $eventTypeRepo;

    public function __construct(){
        $this->db = new Database();
		$this->userRepo = $GLOBALS['UserRepository'];
		$this->eventTypeRepo = $GLOBALS['EventTypeRepository'];
    }

    public function get()
    {
        $res = $this->db->query("SELECT * FROM event");
		$events = [];
		foreach($res as $e){
			$events[] = $this->mapEvent($e);
		}
        return $events;
    }

	public function getById($id)
	{
		$res = $this->db->query("SELECT * FROM event WHERE EventId = $id");
		if(count($res)==0) return null;
		$event = $this->mapEvent($res[0]);
		return $event;
	}

    public function getByUserId($id){
		$res = $this->db->query("SELECT * FROM event where UserId = ".$id);
		if(count($res)==0) return null;
		$events = [];
		foreach($res as $e){
			$events[] = $this->mapEvent($e);
		}
        return $events;
    }

	public function getCurrentNotification($id, $now){
		$res = $this->db->query("SELECT Notification FROM event where UserId = ".$id.' and StartDate<="'.$now.'" and "'.$now.'"<=EndDate');
		$notifications = [];
		foreach($res as $i){
			$notifications[] = $i['Notification'];
		}
		return $notifications;
	}
	
	public function insert($event){
		$this->db->queryWithoutResult("INSERT INTO `event`(`UserId`, `EventTypeId`, `Description`, `StartDate`, `EndDate`, `Notification`, `Name`)".
			" VALUES ('".$event->user->id."','".$event->event_type->id."','$event->description','$event->startDate','$event->endDate','$event->notification','$event->name')");
	}

	public function update($event){
		$q = 'UPDATE `event` SET `EventTypeId`='.$event->event_type->id.',`Description`="'.$event->description.'",`Notification`="'.$event->notification.'",`StartDate`="'.$event->startDate.'",`EndDate`="'.$event->endDate.'",`Name`="'.$event->name.'" WHERE `EventId` = '.$event->id;
		$this->db->queryWithoutResult($q);
	}
	
	private function mapEvent($e){
		return new Event($e['EventId'], $this->userRepo->getById($e['UserId']), $e['Description'], $e['Notification'], $this->eventTypeRepo->getById($e['EventTypeId']), $e['StartDate'], $e['EndDate'], $e['Name']);
	}
}