<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:23
 */
namespace Logic\DataBase;

class Database
{
    var $connection;

    private static $instance;

    private function __construct(){
        $this->connection = mysqli_connect('localhost','root','cnfybckfd') or die("Ошибка соединения с сервером");
        mysqli_select_db($this->connection, "organizer") or die("База данных не выбрана");
    }

    public function queryWithoutResult($q){
        $result = mysqli_query($this->connection, $q) or die(mysqli_errno($this->connection) .":". mysqli_error($this->connection));
    }

    public function query($q){
        $result = mysqli_query($this->connection, $q) or die(mysqli_errno($this->connection) .":". mysqli_error($this->connection));
        $rows = [];
        while($r=$result->fetch_assoc()) {
            $rows[] = $r;
        }
        return $rows;
    }

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
    }
}