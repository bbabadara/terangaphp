<?php
namespace  Bba\Models;

use Bba\Core\Model\CoreModel;

class LoisModel extends CoreModel{
    public function __construct() {
       parent::__construct();
       $this->table="lois";
       $this->primaryKey="idl";

    }


}
    