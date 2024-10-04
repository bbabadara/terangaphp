<?php
namespace  Bba\Models;

use Bba\Core\Model\CoreModel;

class UsersModel extends CoreModel{
    public function __construct() {
       parent::__construct();
       $this->table="users";
       $this->primaryKey="idu";
    }
public function getAll(){
     $sql="SELECT * FROM `users` u JOIN profile p on u.idp=p.idp;";
    return parent::doSelect($sql);
}
public function findUserConnect(string $log, string $mdp){
    $sql="SELECT * FROM `users` u JOIN profile p on u.idp=p.idp where email='$log' and mdp='$mdp'";
    
    return parent::doSelect($sql,true);
}

}
    