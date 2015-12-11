<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 11.12.2015
 * Time: 23:59
 */

namespace Model;
use DataBase\Database;

class BaseEntity
{
    protected $fields;
    protected $tableName;
    protected $db;


    protected function __constructor()
    {
        $this->fields = array();
        $db = Database::getInstance();
    }

    public function get(){
        $this->fields = $this->db->queryWithoutResult("Select * from `$this->tableName`");
    }

    public function insert()
    {
        $names = "";
        $values = "";
        foreach($this->fields as $k=>$v){
            $names .= "`$k`";
            $values .= "\"$v\"";
        }
        print "INSERT INTO `$this->tableName`($names) VALUES ($values)";
        $this->db->queryWithoutResult("INSERT INTO `$this->tableName`($names) VALUES ($values)");
    }
}