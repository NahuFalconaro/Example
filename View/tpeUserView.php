<?php

require_once('libs/Smarty.class.php');


class tpeUserView {

    function __construct(){

    }
    public function displayLogin($loged){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Login");
        $smarty->assign('loged',$loged);
        $smarty->display('templates/login.tpl');
    }
    function displayUser($users,$loged){
        $smarty = new Smarty();
        $smarty->assign('users',"users");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('users',$users);
        $smarty->assign('loged',$loged);
        $smarty->display('templates/usuario.tpl');
    }
}
