<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 11.12.2015
 * Time: 23:59
 */

namespace Model;
use Logic\DataBase\Database;

abstract class BaseEntity
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
        return count($this->fields)==0;
    }

    public function get(){
        return $this->db->query("Select * from `$this->tableName`");
    }

    public function getById($id){
        $res = $this->db->query("Select * from `$this->tableName` where $this->idColumnName = $id");
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
            $names .= "`$k`,";
            $values .= "\"$v\",";
        }
        $q = "INSERT INTO `$this->tableName`(".substr($names,0,-1).") VALUES (".substr($values,0,-1).")";
        $this->db->queryWithoutResult($q);
    }

    public function update(){
        $q = 'UPDATE `'.$this->tableName.'` SET ';
        foreach($this->fields as $k=>$v){
            if($k==$this->idColumnName || $v==null){
                continue;
            }
            $q .= "`$k` = \"$v\", ";
        }
        $q = substr($q, 0, -2)." where $this->idColumnName = ".$this->fields[$this->idColumnName];
        $this->db->queryWithoutResult($q);
    }
}