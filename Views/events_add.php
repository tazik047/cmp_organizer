<?php function RenderBody(){
	if($_POST){
		$event = new Event(0,
			get_current_organizer_user(),
			$_POST['description'],
			$_POST['notification'],
			new EventType($_POST['event_type'],'','',''),
			$_POST['start_date'].' '.$_POST['start_time'],
			$_POST['end_date'].' '.$_POST['end_time'],
			$_POST['name']);
		if(new DateTime($_POST['start_date'].' '.$_POST['start_time'])>=
			new DateTime($_POST['end_date'].' '.$_POST['end_time'])){
			$errors = [];
			$errors[] = 'Дата начала должна быть меньше даты конца';
		}
		else {
			$GLOBALS['EventRepository']->insert($event);
			echo("<script>location.href = '" . generateUrl('events') . "';</script>");
		}
	}
	?>
	<form method="POST">
		<div class="form-horizontal">
			<h2>Новое событие</h2>
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
					<input type="text" id="name" name="name" class = "form-control" required value="<?php print get_value_for_form('name');?>">
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="start_date">Дата начала: </label>
				<div class="col-md-10">
					<div class="col-md-9">
						<input type="date" name="start_date" class = "form-control" id="start_date" value="<?php print get_value_for_form('start_date');?>" required>
					</div>
					<div class="col-md-3">
						<input type="time" name="start_time" class="form-control" id="start_time" value="<?php print get_value_for_form('start_time');?>" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="end_date">Дата конца: </label>
				<div class="col-md-10">
					<div class="col-md-9">
						<input type="date" name="end_date" class = "form-control" id="end_date" value="<?php print get_value_for_form('end_date');?>" required>
					</div>
					<div class="col-md-3">
						<input type="time" name="end_time" class="form-control" id="end_time" value="<?php print get_value_for_form('end_time');?>" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="event_type"> Тип события: </label>
				<div class="col-md-10">
					<?php
					$repo = $GLOBALS['EventTypeRepository'];
					$types = $repo->get();
					?>
					<select class="form-control" id="event_type" name="event_type" required>
						<?php foreach($types as $t):?>
							<option value="<?php print $t->id; ?>" style="background-color: <?php print $t->color; ?>" >
								<?php print $t->name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="description">Описание</label>
				<div class="col-md-10">
					<textarea class="form-control" name="description" id="description" required><?php print trim(get_value_for_form('description')); ?>
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="notification">Уведомление</label>
				<div class="col-md-10">
					<textarea class="form-control" name="notification" id="notification" required><?php print trim(get_value_for_form('notification')); ?>
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<input type="submit" value="Добавить" class="btn btn-default btn-success btn-block" />
				</div>
			</div>
		</div>
	</form>
<?php
return '<script src="/Views/assets/js/event_type_select.js"></script>';
}

function get_value_for_form($name)
{
	return isset($_POST[$name]) ? $_POST[$name] : "";
}
?>