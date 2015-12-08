<?php function RenderBody(){
	$u = get_current_organizer_user();
	if($_POST){
		$repo = $GLOBALS['UserRepository'];
		$errors = [];
		if(!isset($_POST['firstName']))	{
			$errors[] = "Вы не указали свое имя";
		}
		if(!isset($_POST['surname']))	{
			$errors[] = "Вы не указали свою фамилию";
		}
		if(count($errors)==0){
			upload_avatar($repo);
			$user = new User($u->id, '', '');
			$user->firstName = $_POST['firstName'];
			$user->surname = $_POST['surname'];
			$repo->updateProfile($user);
			if(count($errors)==0){
				echo("<script>location.href = '".generateUrl('profile')."';</script>");
			}
		}
	}

	?>
	<form enctype = "multipart/form-data" method="POST">
		<div class="form-horizontal">
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
				<label class = "control-label col-md-2" for="firstName">Имя: </label>
				<div class="col-md-10">
					<input type="text" name="firstName" class = "form-control" id="firstName" value="<?php print $u->firstName; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="surname">Фамилия: </label>
				<div class="col-md-10">
					<input type="text" name="surname" class = "form-control" id="surname" value="<?php print $u->surname; ?>" required>
				</div>
			</div>
			
			<div class="form-group">
				<label id="avatar" class="control-label col-md-2">Аватар</label>
				<div class="col-md-10">
					<img width="150" src="<?php print generateUrl('avatar'); ?>" />
					<div>
						Загрузить новое изображение:
						<input type="file" name="avatar" class="form-control" accept="image/*" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<input type="submit" value="Сохранить" class="btn btn-default btn-success btn-block" />
				</div>
			</div>
		</div>
	</form>
<?php } ?>