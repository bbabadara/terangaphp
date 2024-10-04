<?php
namespace Bba\Core\Routeur;
use Bba\Controllers\AvisController;
use Bba\Controllers\LoisController;
use Bba\Controllers\SecurityController;
use Bba\Core\Controller\CoreController;
use Bba\Core\Session\Session;

class Routeur
{
    private Session $session;
    private CoreController $coreController;
    public function __construct() {
       $this->session= new Session();
       $this->coreController = new CoreController();
    }
    public function root()
    {
        if (!$this->session->isset("userConnect") && $_REQUEST["controller"]!="security") {
           $this->coreController->redirect("security","login");
        }

        if (isset($_REQUEST["controller"])) {
            $recup = $_REQUEST["controller"];
            if ($recup == "avis") {
                $controller=new AvisController;
                 $controller->load();
            } elseif ($recup == "lois") {
                $controller=new LoisController();
                 $controller->load();
            } elseif ($recup == "security") {
                $controller=new SecurityController;
                $controller->load();
            } else{
                echo "on y viendra";
            }
        } else {
            $controller=new SecurityController;
                $controller->load();
        }
    }
}
