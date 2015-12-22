<?php
namespace Model;

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
class User extends BaseEntity
{
    public function getId(){
        return isset($this->fields['UserId'])?$this->fields['UserId']:"";
    }

    public function setId($id){
        $this->fields['UserId'] = $id;
    }

    public function getPassword(){
        return isset($this->fields['Password'])?$this->fields['Password']:"";
    }

    public function setPassword($password){
        $this->fields['Password'] = $password;
    }

    public function getEmail(){
        return isset($this->fields['Email'])?$this->fields['Email']:"";
    }

    public function setEmail($email){
        $this->fields['Email'] = $email;
    }

    public function getFirstName(){
        return isset($this->fields['FirstName'])?$this->fields['FirstName']:"";
    }

    public function setFirstName($firstName){
        $this->fields['FirstName'] = $firstName;
    }

    public function getSurname(){
        return isset($this->fields['Surname'])?$this->fields['Surname']:"";
    }

    public function setSurname($surname){
        $this->fields['Surname'] = $surname;
    }

    public function __construct(){
        parent::__construct();
        $this->idColumnName = "UserId";
        $this->tableName = "user";
    }

    public function get()
    {
        $res = $this->db->query("SELECT * FROM user left join profile on UserId = ProfileId");
        $users = [];
        foreach($res as $u){
            $i = new User();
            $i->fields = $u;
            $users[] = $i;
        }
        return $users;
    }

    public function getById($id){
        $res = $this->db->query("SELECT * FROM user left join profile on UserId = ProfileId where UserId = ".$id);
        if(count($res)==0) return null;
        $this->fields = $res[0];
    }

    public function getByEmail($email){
        $res = $this->db->query("SELECT * FROM user left join profile on UserId = ProfileId where Email = '$email'");
        if(count($res)!=0){
            $this->fields = $res[0];
        }
    }

    public function getAvatarType(){
        return isset($this->fields['Content_type'])?$this->fields['Content_type']:"";
    }

    public function updateProfile(){
        $res = $this->db->query("SELECT * FROM profile where ProfileId = ".$this->getId());
        if(count($res)==0){
            $this->db->queryWithoutResult('insert into profile(`ProfileId`, `FirstName`, `Surname`) values("'.$this->getId().'", "'.$this->getFirstName().'", "'.$this->getSurname().'")');
        }
        else{
            $this->db->queryWithoutResult('UPDATE `profile` SET `FirstName`="'.$this->getFirstName().'", `Surname`="'.$this->getSurname().'" WHERE ProfileId='.$this->getId());
        }
    }

    public function insert(){
        $this->db->queryWithoutResult('insert into user(`Password`, `Email`) values("'.$this->getPassword().'", "'.$this->getEmail().'")');
    }

    public function setAvatarType($type){
        $this->fields['Content_type'] = $type;
        $this->db->queryWithoutResult('UPDATE `user` SET `Content_type`="'.$type.'" WHERE UserId='.$this->getId());
    }

    public function update()
    {
        $this->db->queryWithoutResult('UPDATE `user` SET `Password`="'.$this->getPassword().'" WHERE UserId='.$this->getId());
    }
}