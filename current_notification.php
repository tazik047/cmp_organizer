<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
 $AllowAnonymous = false;
 
Include 'Logic/includes.php';
$user = get_current_organizer_user();
$event = new Event();
$notifications = $event_repo->getCurrentNotification(get_current_organizer_user()->id, (new DateTime())->format('Y-m-d H:i:s'));
if(count($notifications)!=0):?>
 <a href="<?php print generateUrl('events')?>">
  <ul class="list-group">
   <?php foreach($notifications as $n):?>
     <li class="list-group-item"><?php print $n; ?></li>
  <?php endforeach; ?>
  </ul>
 </a>
<?php endif; ?>
