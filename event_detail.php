<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
 $AllowAnonymous = false;
 
Include 'Logic/includes.php';
$event_repo = $GLOBALS['EventRepository'];
$event = $event_repo->getById($_GET['id']);
?>
<div>
 <h2><?php print $event->name; ?></h2>
 <hr />
 <dl class="dl-horizontal">
  <dt>
   Тип события
  </dt>

  <dd>
   <?php print $event->event_type->name; ?>
  </dd>

  <dt>
   Описание
  </dt>

  <dd>
   <?php print $event->description; ?>
  </dd>

  <dt>
   Уведомление
  </dt>

  <dd>
   <?php print $event->notification; ?>
  </dd>
  <dt>
   Начало
  </dt>

  <dd>
   <?php print $event->startDate;?>
  </dd>
  <dt>
   Конец
  </dt>

  <dd>
   <?php print $event->endDate;?>
  </dd>
 </dl>
 <br />
 <a class="btn btn-block btn-default btn-success" href="<?php print generateUrl('events','method=update&id='.$event->id); ?>">
  Изменить событие
 </a>
</div>
