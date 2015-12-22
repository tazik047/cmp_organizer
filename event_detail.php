<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */

use Model\Event;

 $AllowAnonymous = false;
 
Include 'Logic/includes.php';
$event = new Event();
$event->getById($_GET['id']);
?>
 <hr />
 <dl class="dl-horizontal">
  <dt>
   Тип события
  </dt>

  <dd>
   <?= $event->getEventType()->getName() ?>
  </dd>

  <dt>
   Описание
  </dt>

  <dd>
   <?= $event->getDescription(); ?>
  </dd>

  <dt>
   Уведомление
  </dt>

  <dd>
   <?= $event->getNotification(); ?>
  </dd>
  <dt>
   Начало
  </dt>

  <dd>
   <?= $event->getStartDate();?>
  </dd>
  <dt>
   Конец
  </dt>

  <dd>
   <?= $event->getEndDate();?>
  </dd>
 </dl>
 <br />
 <a class="btn btn-block btn-default btn-success" href="<?= generateUrl('events','method=update&id='.$event->getId()); ?>">
  Изменить событие
 </a>
