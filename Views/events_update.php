<?php function RenderBody(){
	$event = new \Model\Event();
	$event->getById($_GET['id']);
	if($_POST) {
		$event->setDescription($_POST['description']);
		$event->setName($_POST['name']);
		$event->setNotification($_POST['notification']);
		$event->setEventTypeId($_POST['event_type']);
		$event->setStartDate($_POST['start_date'].' '.$_POST['start_time']);
		$event->setEndDate($_POST['end_date'].' '.$_POST['end_time']);

		if (new DateTime($_POST['start_date'] . ' ' . $_POST['start_time']) >=
			new DateTime($_POST['end_date'] . ' ' . $_POST['end_time'])
		) {
			$errors = [];
			$errors[] = 'Дата начала должна быть меньше даты конца';
		} else {
			$event->update();
			echo("<script>location.href = '" . generateUrl('events') . "';</script>");
		}
	}
	?>
	<form method="POST">
		<input type="hidden" value="<?php print $_GET['id']; ?>" name="id">
		<div class="form-horizontal">
			<h2>Обновление события</h2>
			<hr />
			<?php if(isset($errors)): ?>
				<p class="bg-danger">
					<?php
					foreach($errors as $e){
						print "<span> — $e</span><br>";
					}
					?>
				</p>
			<?php endif; ?>

			<div class="form-group">
				<label for="name" class = "control-label col-md-2">Название</label>
				<div class="col-md-10">
					<input type="text" id="name" name="name" class = "form-control" required value="<?= $event->getName();?>">
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="start_date">Дата начала: </label>
				<div class="col-md-10">
					<div class="col-md-9">
						<input type="date" name="start_date" class = "form-control" id="start_date" value="<?= explode(' ',$event->getStartDate())[0];?>" required>
					</div>
					<div class="col-md-3">
						<input type="time" name="start_time" class="form-control" id="start_time" value="<?= explode(' ',$event->getStartDate())[1];?>" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="end_date">Дата конца: </label>
				<div class="col-md-10">
					<div class="col-md-9">
						<input type="date" name="end_date" class = "form-control" id="end_date" value="<?= explode(' ',$event->getEndDate())[0];?>" required>
					</div>
					<div class="col-md-3">
						<input type="time" name="end_time" class="form-control" id="end_time" value="<?= explode(' ',$event->getEndDate())[1];?>" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="event_type"> Тип события: </label>
				<div class="col-md-10">
					<?php
					$eventType =new \Model\EventType();
					$types = $eventType->get();
					?>
					<select class="form-control" id="event_type" name="event_type" required>
						<?php foreach($types as $t):?>
							<option value="<?= $t->getId(); ?>" style="background-color: <?= $t->getColor(); ?>" <?= $t->getId()==$event->getEventTypeId()?"selected":"";?> >
								<?= $t->getName(); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="description">Описание</label>
				<div class="col-md-10">
					<textarea class="form-control" name="description" id="description" required><?= trim($event->getDescription()); ?>
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="notification">Уведомление</label>
				<div class="col-md-10">
					<textarea class="form-control" name="notification" id="notification" required><?= trim($event->getNotification()); ?>
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<input type="submit" value="Обновить" class="btn btn-default btn-success btn-block" />
				</div>
			</div>
		</div>
	</form>
<?php
return "<script>$(document).ready(function(){ $('#event_type').change(function(e){".
       "$(this).css('background-color', $(this).find(':selected').css('background-color'));".
		"}); $('#event_type').change();});</script>";
}
?>