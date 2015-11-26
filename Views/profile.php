<?php function RenderBody(){ 
$user = get_current_organizer_user();
?>

<h2>Информация о пользователе</h2>

<div>
    <h4><?php print $user->email; ?></h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Фото
        </dt>
        <dd>
            <img src="/Views/assets/img/ui-sam.jpg"/>
        </dd>
        <dt>
            Email
        </dt>

        <dd>
            <?php print $user->email; ?>
        </dd>
    </dl>
</div>
<p>
	<a href="<?php print generateUrl('profile','method=manage'); ?>">
		Редактировать данный
	</a>
</p>
<?php } ?>