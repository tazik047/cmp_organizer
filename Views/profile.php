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
            <img src="<?php print generateUrl('avatar'); ?>"/>
        </dd>
        <dt>
            Email
        </dt>

        <dd>
            <?php print $user->email; ?>
        </dd>
        <?php if($user->firstName!=null):?>
            <dt>
                Имя
            </dt>

            <dd>
                <?php print $user->firstName; ?>
            </dd>
            <dt>
                Фамилия
            </dt>

            <dd>
                <?php print $user->surname; ?>
            </dd>
        <?php endif; ?>
    </dl>
</div>
<p>
	<a href="<?php print generateUrl('profile','method=manage'); ?>">
		Редактировать данный
	</a> |
    <a href="<?php print generateUrl('profile','method=password'); ?>">
        Изменить пароль
    </a>
</p>
<?php } ?>