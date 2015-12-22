<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
Include 'Logic/includes.php';
isAuthorized();
$event = new \Model\Event();
$events = $event->getByUserId(get_current_organizer_user()->getId());
$eventsRes = [];
foreach($events as $e){
 $eventsRes[] = new \Model\EventViewModel($e->getId(),$e->getName(),$e->getEventType()->getColor(),$e->getStartDate(),$e->getEndDate());
}
print json_encode($eventsRes, JSON_UNESCAPED_UNICODE);