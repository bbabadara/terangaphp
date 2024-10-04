<?php
use Bba\Core\Routeur\Routeur;
 define("ROOT", "C:/Users/bbaba/Documents/000terangaCode/terangaphp");
 define("WEBROOT", "http://localhost:8000");
 require_once ROOT . "/vendor/autoload.php";
$root=new Routeur;
$root->root();
