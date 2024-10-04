<?php

namespace  Bba\Controllers;

use Bba\Core\Controller\CoreController;
use Bba\Models\AvisModel;
use Bba\Models\LoisModel;

class LoisController  extends CoreController
{
    private LoisModel $loisModel;
    private AvisModel $avisModel;

    public function __construct()
    {
        parent::__construct();
        $this->loisModel = new LoisModel();
        $this->avisModel = new AvisModel();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
            if ($action == "liste") {
                $this->listeLois();
            } elseif ($action == "details") {
                $this->detailsLois();
            }
        } else {
            $this->listeLois();
        }
    }
    public function listeLois(): void
    {
        $lois = $this->loisModel->selectALL();
        parent::loadview(views: "lois/liste", datas: ["lois" => $lois]);
    }
    public function detailsLois()
    {
      
        $key = $_REQUEST["key"];
        $loi = $this->loisModel->selectById($key);
        $avis = $this->avisModel->getAvisByLois($key);
        if (isset($_REQUEST["addavis"])) {
            $this->addAvis();
        }
        parent::loadview(views: "lois/details", datas: ["loi" => $loi, "avis" => $avis]);
    }

    public function addAvis()
    {
        $this->validator->isEmpty("contenu");
        $this->validator->isEmpty("titrea");
        if ($this->validator->validate($this->validator->errors)) {
            $data = [
                "idl" => $_POST["idl"],
                "idu" => $_POST["idu"],
                "titrea"=>$_POST["titrea"],
                "contenu" => $_POST["contenu"]
            ];
            $this->avisModel->doInsert($data);
            header("Location: index.php?controller=lois&action=details&key=" . $_POST["idl"]);
        }else{
            $this->session->add("errors", $this->validator->errors);
        }
    }
}
