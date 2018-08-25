<?php
namespace models;

use core\Model;
use PDO;

class login_model extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getPasswordByUsername($username){
        $sql= 'SELECT * FROM login WHERE username = :user ;';
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':user', $username);
        $pstm->execute();
        $result = $pstm->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public function getUserDetail($userId){
        $sql= 'SELECT * FROM login WHERE username = :user ;';
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':user', $userId);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
}