<?php function RenderBody(){ 
$user = get_current_organizer_user();
?>

<h2>Информация о пользователе</h2>

<div>
    <h4><?= $user->getEmail(); ?></h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Фото
        </dt>
        <dd>
            <img style="max-width: 100%;" src="<?= generateUrl('avatar'); ?>"/>
        </dd>
        <dt>
            Email
        </dt>

        <dd>
            <?= $user->getEmail(); ?>
        </dd>
        <?php if($user->getFirstName()!=""):?>
            <dt>
                Имя
            </dt>

            <dd>
                <?= $user->getFirstName(); ?>
            </dd>
            <dt>
                Фамилия
            </dt>

            <dd>
                <?= $user->getSurname(); ?>
            </dd>
        <?php endif; ?>
    </dl>
</div>
<p>
	<a href="<?= generateUrl('profile','method=manage'); ?>">
		Редактировать данный
	</a> |
    <a href="<?= generateUrl('profile','method=password'); ?>">
        Изменить пароль
    </a>
</p>
<?php } ?>