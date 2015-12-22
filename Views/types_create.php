<?php function RenderBody(){
	if($_POST && isset($_POST['name']) && isset($_POST['color'])){
		$type = new \Model\EventType();
		$type->setName($_POST['name']);
		$type->setColor($_POST['color']);
		$type->setUserId(get_current_organizer_user()->getId());
		$type->insert();
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
					<input type="text" id="name" name="name" class = "form-control" value="<?= get_value_for_form('name');?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="color" class = "control-label col-md-offset-2 col-md-2">Цвет</label>
				<div class="col-md-6">
					<input type="color" id="color" name="color" class = "form-control" value="<?= get_value_for_form('color');?>" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-8">
					<input type="submit" value="Создать" class="btn btn-default btn-block btn-success" />
				</div>
			</div>
		</div>
	</form>
<?php }
function get_value_for_form($name)
{
	return isset($_POST[$name]) ? $_POST[$name] : ($name=="color"?"#000000":"");
}

?>