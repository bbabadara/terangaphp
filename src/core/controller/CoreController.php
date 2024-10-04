<?php

namespace Bba\Core\Controller;

use Bba\Core\Session\Session;
use Bba\Core\Validator\Validator;

class CoreController
{
    protected Validator $validator;
    protected Session $session;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->session = new Session();
    }
    public function loadview(string $views, array $datas = [], $layout = "base")
    {
        ob_start();
        extract($datas);
        require_once ROOT . "/views/".$views.".html.php";
        $cFV = ob_get_clean();
        require_once ROOT."/views/layouts/" . $layout . ".layout.php";
    }
 

    public function path(string $controller, string $action, array $additional =[]): string
    {
        $link = WEBROOT . "/?controller=$controller&action=$action";
        if (!empty($additional)) {
            foreach ($additional as $key => $value) {
                $link =$link."&"."$key=$value";
            }
        }
        return $link;
    }

    public function redirect(string $controller, string $action, array $additional=[])
    {
        $ur="/?controller=$controller&action=$action";
        if (!empty($additional)) {
            foreach ($additional as $key => $value) {
                $ur = $ur . "&" . "$key=$value";
            }
        }
        header("location:".WEBROOT.$ur);
        exit;
    }

    
   
  

    
    
  
}
