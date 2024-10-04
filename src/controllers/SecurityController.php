<?php

namespace  Bba\Controllers;

use Bba\Core\Controller\CoreController;
use Bba\Models\UsersModel;

class SecurityController  extends CoreController
{
    private UsersModel $userModel;


    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UsersModel();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
            if ($action == "login") {
                self::login();
            } elseif ($action == "logout") {
                self::logout();
            }
        } else {
            self::login();
        }
    }

    public function login()
    {
        if ($this->session->isset("userConnect")) {
            parent::redirect("user", "dashboard");
        }
        if (isset($_REQUEST["login"])) {
            $this->session->add("userLog", $_POST);
            $this->validator->isEmpty("login", "login obligatoire");
            $this->validator->isEmpty("mdp", "mot de passe obligatoire");
            if ($this->validator->validate($this->validator->errors)) {
                extract($_POST);
                $userConnect = $this->userModel->findUserConnect($login, $mdp);
                if ($userConnect) {
                        $this->session->add("userConnect", $userConnect);
                        parent::redirect("lois", "liste");     
                } else {
                    $this->session->addAsoc("errors", "alert", "login ou mot de passe incorrect!");
                }
            } else {
                $this->session->add("errors", $this->validator->errors);
            }
        }
        $this->loadview("security/login", [], "security");
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        parent::redirect("security", "login");
    }
}
