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

    public function getByEmail($email){
        $res = $this->db->query("SELECT * FROM user left join profile on UserId = ProfileId where Email = '$email'");
        if(count($res)!=0){
            $this->fields = $res[0];
        }
    }

    public function getAvatarType(){
        return isset($this->fields['Content_type'])?$this->fields['Content_type']:"";
    }

    public function updateProfile($user){
        $res = $this->db->query("SELECT * FROM profile where ProfileId = $user->id");
        if(count($res)==0){
            $this->db->queryWithoutResult('insert into profile(`ProfileId`, `FirstName`, `Surname`) values("'.$user->id.'", "'.$user->firstName.'", "'.$user->surname.'")');
        }
        else{
            $this->db->queryWithoutResult('UPDATE `profile` SET `Password`="'.$user->firstName.'", `Surname`="'.$user->surname.'" WHERE ProfileId='.$user->id);
        }
    }
}