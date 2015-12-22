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
 <hr />
 <dl class="dl-horizontal">
  <dt>
   Тип события
  </dt>

  <dd>
   <?= $event->event_type->name; ?>
  </dd>

  <dt>
   Описание
  </dt>

  <dd>
   <?= $event->description; ?>
  </dd>

  <dt>
   Уведомление
  </dt>

  <dd>
   <?= $event->notification; ?>
  </dd>
  <dt>
   Начало
  </dt>

  <dd>
   <?= $event->startDate;?>
  </dd>
  <dt>
   Конец
  </dt>

  <dd>
   <?= $event->endDate;?>
  </dd>
 </dl>
 <br />
 <a class="btn btn-block btn-default btn-success" href="<?= generateUrl('events','method=update&id='.$event->id); ?>">
  Изменить событие
 </a>
