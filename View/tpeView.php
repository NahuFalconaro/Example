<?php

require('./libs/Smarty.class.php');


class tpeView {

    private $model;
    function __construct(){
        $this->model = new tpeModelUser();
    }

    public function DisplayTable($ejercicios, $dificultad, $loged){
        $smarty = new Smarty();


        $smarty->assign('titulo',"Rutinas");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('ejercicios',$ejercicios);
        $smarty->assign('dificultad',$dificultad);
        $smarty->assign('loged', $loged);
        $smarty->display('templates/ver_tabla.tpl');
    }
    
    function displayIndex($loged){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Home");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('loged',$loged);
        $smarty->display('templates/index.tpl');
    }

    function displayTienda($loged, $productos){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Tienda");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('loged',$loged);
        $smarty->assign('productos',$productos);
        $smarty->display('templates/tienda.tpl');
    }
    function verComentarios($producto, $loged){
        
        $smarty = new Smarty();
        $smarty->assign('titulo',"Comentarios");
        $smarty->assign('producto',$producto);
        $smarty->assign('loged',$loged);
        //$smarty->assign('promedioProducto',$promedioProducto);
        $smarty->display('templates/verComentarios.tpl');
    }
    public function DisplayTableDificultad($dificultad, $loged){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Rutinas");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('dificultad',$dificultad);
        $smarty->assign('loged',$loged);
        $smarty->display('templates/ver_tablaDificultad.tpl');
    }
    public function DisplayRegistro($loged){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Rutinas");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('loged',$loged);
        $smarty->display('templates/registro.tpl');
    }
}
