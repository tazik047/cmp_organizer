<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 11.12.2015
 * Time: 23:59
 */

namespace Model;
use Logic\DataBase\Database;

class BaseEntity
{
    protected $fields;
    protected $tableName;
    protected $db;
    protected $idColumnName;


    protected function __construct()
    {
        $this->fields = array();
        $this->db = Database::getInstance();
    }

    public function isEmpty(){
        return count($this->fields);
    }

    public function get(){
        $this->fields = $this->db->queryWithoutResult("Select * from `$this->tableName`");
    }

    public function getById($id){
        $res = $this->db->queryWithoutResult("Select * from `$this->tableName` where $this->idColumnName = $id");
        if(count($res)!=0){
            $this->fields = $res[0];
        }
    }

    public function insert()
    {
        $names = "";
        $values = "";
        foreach($this->fields as $k=>$v){
            if($k==$this->idColumnName || $v==null){
                continue;
            }
            $names .= "`$k`";
            $values .= "\"$v\"";
        }
        print "INSERT INTO `$this->tableName`($names) VALUES ($values)";
        $this->db->queryWithoutResult("INSERT INTO `$this->tableName`($names) VALUES ($values)");
    }

    public function update($event){
        $q = 'UPDATE `event` SET ';
        foreach($this->fields as $k=>$v){
            if($k==$this->idColumnName || $v==null){
                continue;
            }
            $q .= "`$k` = \"$v\", ";
        }
        $q = substr($q, 0, -1)." where $this->idColumnName = $this->fields[$this->idColumnName]";
        $this->db->queryWithoutResult($q);
    }
}