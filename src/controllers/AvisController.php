<?php

namespace  Bba\Controllers;

use Bba\Core\Controller\CoreController;
use Bba\Models\AvisModel;

class AvisController  extends CoreController
{
    private AvisModel $avisModel;
    public function __construct()
    {
        parent::__construct();
        $this->avisModel = new AvisModel();
    }
    

    public function load()
    {
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
            if ($action == "liste") {
                $this->listeAvis();
            } elseif ($action == "details") {
                $this->detailsAvis();
            }
        } else {
            $this->listeAvis();
        }
    }
    public function listeAvis(): void
    {
        $avis=$this->avisModel->getAvisWithCitoyen();
        parent::loadview(views: "avis/liste",datas: ["avis"=>$avis]);
    }
    public function detailsAvis()
    {
      
        $key = $_REQUEST["key"];
        $avis = $this->avisModel->getAvisById($key);
       $this->updateEtat();
        parent::loadview(views: "avis/details", datas: ["avis" => $avis]);
    }
    public function updateEtat(){
        if (isset($_REQUEST["etat"])) {
            $etat = $_REQUEST["etat"];
            $id=$_REQUEST["ida"];
            $this->avisModel->updateEtat($id,$etat);
            parent::redirect("avis","details",["key"=>$id]);
        }
    }

}
