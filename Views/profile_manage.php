<?php function RenderBody(){ ?>
	<form enctype = "multipart/form-data" action="POST">
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
				<label class = "control-label col-md-2" for="old">Старый пароль: </label>
				<div class="col-md-10">
					<input type="password" name="old_password" class = "form-control" id="old">
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="new">Новый пароль: </label>
				<div class="col-md-10">
					<input type="password" name="new_password" class = "form-control" id="new">
				</div>
			</div>

			<div class="form-group">
				<label class = "control-label col-md-2" for="repeate"> Повторите пароль: </label>
				<div class="col-md-10">
					<input type="password" name="repeate_password" class = "form-control" id="repeate">
				</div>
			</div>
			
			<div class="form-group">
				<label id="avatar" class="control-label col-md-2">Аватар</label>
				<div class="col-md-10">
					<img width="150" src="/Views/assets/img/ui-sam.jpg" />
					<div>
						Загрузить новое изображение:
						<input type="file" name="File" class="form-control" accept="image/*" />
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