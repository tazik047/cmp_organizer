<?php function RenderBody(){?>
	<h2>Мои типы событий</h2>
	<?php
	$repo = $GLOBALS['EventTypeRepository'];
	$types = $repo->getByUserId(get_current_organizer_user()->id);
	if(count($types)==0){
		print 'Вы еще не создали ни одного типа события';
	}
	else{
	?>
	<style>
		.color-block{
			width: 100px;
			height: 25px;
			margin: 10px auto;
			text-align: center;
		}
	</style>
	<table class="table table-bordered table-striped table-responsive">
		<thead>
			<tr>
				<th>Название</th>
				<th>Цвет</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($types as $t):?>
				<tr>
					<td style="
						text-align: center;
						vertical-align: middle;
					"><?php print $t->name; ?></td>
					<td><div class="color-block" style="background-color: <?php print $t->color; ?>"></div></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<?php }} ?>