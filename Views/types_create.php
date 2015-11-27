<?php function RenderBody(){
	if($_POST && isset($_POST['name']) && isset($_POST['color'])){
		$repo = $GLOBALS['EventTypeRepository'];
		$type = new EventType(0, get_current_organizer_user(), $_POST['name'], $_POST['color']);
		$repo->insert($type);
		echo("<script>location.href = '".generateUrl('eventtypes')."';</script>");
	}

?>
<h2>Создание нового типа события</h2>

	<form method="POST">
		<div class="form-horizontal">
			<br />

			<div class="form-group">
				<label for="name" class = "control-label col-md-offset-2 col-md-2">Название</label>
				<div class="col-md-6">
					<input type="text" id="name" name="name" class = "form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="color" class = "control-label col-md-offset-2 col-md-2">Цвет</label>
				<div class="col-md-6">
					<input type="color" id="color" name="color" class = "form-control" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-8">
					<input type="submit" value="Создать" class="btn btn-default btn-block btn-success" />
				</div>
			</div>
		</div>
	</form>
<?php } ?>