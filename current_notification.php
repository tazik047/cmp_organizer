<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
Include 'Logic/includes.php';
isAuthorized();

$event_repo = $GLOBALS['EventRepository'];
$notifications = $event_repo->getCurrentNotification(get_current_organizer_user()->getId(), (new DateTime())->format('Y-m-d H:i:s'));
if(count($notifications)!=0):?>
 <a href="<?= generateUrl('events')?>">
  <ul class="list-group">
   <?php foreach($notifications as $n):?>
     <li class="list-group-item"><?= $n; ?></li>
  <?php endforeach; ?>
  </ul>
 </a>
<?php endif; ?>
