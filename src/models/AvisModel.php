<?php
namespace  Bba\Models;

use Bba\Core\Model\CoreModel;

class AvisModel extends CoreModel{
    public function __construct() {
       parent::__construct();
       $this->table="avis";
       $this->primaryKey="ida";
      

    }
    public function getAvisByCitoyen($idClient){
        $sql="SELECT * FROM `avis` WHERE idc=$idClient;";
       return parent::doSelect($sql);
    }

    public function getAvisByLois($idLois){
        $sql="SELECT * FROM `avis` a join `users` u on a.idu=u.idu WHERE idl=$idLois;";
       return parent::doSelect($sql);
    }
    public function getAvisById($id){
        $sql="SELECT * FROM `avis` a join `users` u on a.idu=u.idu join lois l on a.idl=l.idl WHERE ida=$id;";
       return parent::doSelect($sql,true);
    }
    public function getAvisWithCitoyen(){
        $sql="SELECT * FROM `avis` a join `users` u on a.idu=u.idu join lois l on a.idl=l.idl" ;
       return parent::doSelect($sql);
    }

}
    