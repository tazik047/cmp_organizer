<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
Include 'Logic/includes.php';
isAuthorized();
$repo = $GLOBALS['EventRepository'];
$events = $repo->getByUserId(get_current_organizer_user()->id);
$eventsRes = [];
foreach($events as $e){
 $eventsRes[] = new EventViewModel($e->id,$e->name,$e->event_type->color,$e->startDate,$e->endDate);
}
print json_encode($eventsRes, JSON_UNESCAPED_UNICODE);