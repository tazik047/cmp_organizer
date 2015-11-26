<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:17
 */
class UserRepository
{
    var $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get()
    {
        $res = $this->db->query("SELECT * FROM user");
        print_r($res);
        die();
    }

    public function get($id){

    }
}