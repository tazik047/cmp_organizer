<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */

use Model\Event;
use Model\EventViewModel;

Include 'Logic/includes.php';
isAuthorized();
$user = get_current_organizer_user();
$event = new Event();
$notifications = $event->getCurrentNotification($user->getId(),(new DateTime())->format('Y-m-d H:i'));
if(count($notifications)!=0):?>
 <a href="<?= generateUrl('events')?>">
  <ul class="list-group">
   <?php foreach($notifications as $n):?>
     <li class="list-group-item"><?= $n; ?></li>
  <?php endforeach; ?>
  </ul>
 </a>
<?php endif; ?>
