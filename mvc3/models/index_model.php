<?php
namespace models;

use core\Model;
use PDO;

class index_model extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    
    public function login($user){
    
    $sql="SELECT * FROM users where username = :user ";
    $pstm = $this->connect->prepare($sql);
    
    $pstm->bindParam(':user', $user);
    
    $pstm->execute();
    
    $result = $pstm->fetch(PDO::FETCH_ASSOC);
    
    return $result;
    
    }
    
    
    
}

