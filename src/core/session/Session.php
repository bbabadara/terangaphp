<?php
namespace Bba\Core\Session;

class Session {
    public function __construct(){
        if (session_status()==PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function add (string $key,$value){
        $_SESSION[$key]=$value;
    }
    public function addtotable (string $key,$value){
        $_SESSION[$key][]=$value;
    }
    public function addAsoc (string $tab,string $key,$value){
        $_SESSION[$tab][$key]=$value;
    }
    public function addAsocIncrease (string $tab,string $key,$value){
        $_SESSION[$tab][$key]+=$value;
    }
    public function addAsocDecrease (string $tab,string $key,$value){
        $_SESSION[$tab][$key]-=$value;
    }
    public function get (string $key){
        return $_SESSION[$key];
    }
    public function getRole (){
        return $_SESSION["userConnect"]->libp;
    }
    public function getEtatUser (){
        return $_SESSION["userConnect"]->etat;
    }
    public function isset (string $key){
        return isset($_SESSION[$key]);
    }
    public function unset (string $key){
        unset($_SESSION[$key]);
    }
    public function unset2 (string $key,$key2){
        unset($_SESSION[$key][$key2]);
    }
    public function destroy(){
        session_destroy();
    }

}