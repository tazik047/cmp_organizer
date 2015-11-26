<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */

Include 'Logic/DataBase/Database.php';
Include 'Logic/DataBase/UserRepository.php';

$repo = new UserRepository();
$t = $repo->get();

//Include 'Views/template.php';