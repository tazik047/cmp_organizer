<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
class User
{
    public $id;
    public $password;
    public $email;

    public function __construct($id, $email, $password){
        $this->email=$email;
        $this->id = $id;
        $this->password = $password;
    }
}