<?php

require_once "./Model/tpeModel.php";
require_once "./Model/tpeModelDificultad.php";
require_once "./Model/tpeModelTienda.php";
require_once "./Model/tpeModelUser.php";
require_once "./Model/tpeModelComment.php";
require_once "./View/tpeView.php";

class tpeController{

    private $model;
    private $modelUser;
    private $modelDificultad;
    private $modelTienda;
    private $modelComment;
    private $view;
    private $userView;

    function __construct(){
        $this->model = new tpeModel();
        $this->modelUser = new tpeModelUser();
        $this->modelTienda = new tpeModelTienda();
        $this->modelComment = new tpeModelComment();
        $this->view = new tpeView();
        $this->userView = new tpeUserView();
        $this->modelDificultad = new tpeModelDificultad();
    }

    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGIN);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }


    function insertEjercicio(){
        $this->checkLogIn();
        $this->model->insertEjercicio($_POST['musculo'], $_POST['ejercicio'], $_POST['serie'], $_POST['repeticion'], $_POST['id_dificultad']);
        header("Location: " . BASE_URL . "rutinas");
    }

    function insertProducto(){
        $producto = $_POST['producto'];
        $descripcion = $_POST['descripcion'];

        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ) {
            $this->modelTienda->insertProducto($producto, $descripcion, $_FILES['input_name']['tmp_name']);
        }
        header("Location: " . BASE_URL . "tienda");
    }

    function insertDificultad(){
        $this->checkLogIn();
        $this->modelDificultad->insertDificultad($_POST['dificult']);
        header("Location: " . BASE_URL . "rutinas");
    }
    
    function deletEjercicio($id){
        $this->checkLogIn();
        $this->model->deletEjercicio($id);
        header("Location: " . BASE_URL . "rutinas");
    }
    function deleteComment($id){ // elimina comentario, no esta terminado
        $this->checkLogIn();
        $this->modelComment->deletComentario($id);
        header("Location: " . BASE_URL . "tienda");
    }
    function insertComment($id){
        $this->checkLogIn();
        if(isset($_POST['puntaje']) && ($_POST['puntaje'] <= 5))
            $this->modelComment->insertComentario($_POST['comentario'], $_POST['puntaje'],$id);
        header("Location: " . BASE_URL . "tienda");
    }
    function deletProducto($id){
        $this->checkLogIn();
        $this->modelTienda->deletProducto($id);
        header("Location: " . BASE_URL . "tienda");
    }
    function deletDificultad($id){
        $this->checkLogIn();
        $this->modelDificultad->deletDificultad($id);
        header("Location: " . BASE_URL . "rutinas");
    }
    function modificarID($id){
        $this->checkLogIn();
        $this->model->modificarEjercicio($id);
        header("Location:".BASE_URL ."rutinas");
    }

    function modificarID_Dif($id){
        $this->checkLogIn();
        $this->modelDificultad->modificarDificultad($id);
        header("Location:".BASE_URL ."rutinas");
    }

    function displayTablaEjercicios(){
        $loged = $this->checkLoged();
        $dificultad = $this->modelDificultad->getDificultad();
        $ejercicios = $this->model->getEjerciciosDificultad();
        $this->view->DisplayTable($ejercicios, $dificultad, $loged);
    }

    
    function displayTablaDificultad(){
        $dificultad = $this->modelDificultad->getDificultad();
        $this->view->displayTableDificultad($dificultad);
    }
    
    function displayIndex(){
        $loged = $this->checkLoged();
        $this->view->displayIndex($loged);
    }
    function verComentarios($id){
        $loged = $this->checkLoged();
        $producto = $this->modelTienda->getProducto($id);
        //$promedioProducto = $this->modelComment->getPromedio($id);
        $this->view->verComentarios($producto, $loged);
    }
    function displayTienda(){
        $loged = $this->checkLoged();
        $productos = $this->modelTienda->getProductos();
        $this->view->displayTienda($loged, $productos);
    }
    
    function displayLogin(){
        $loged = $this->checkLoged();
        $this->userView->displayLogin($loged);
    }
    function displayRegistro(){
        $loged = $this->checkLoged();
        $this->view->displayRegistro($loged);
    }
    function checkLoged(){
        session_start();
        if(isset($_SESSION['userId'])){
            $loged = $this->modelUser->getUser($_SESSION['userId']);
            return $loged->permiso;
        }else 
            return "anonimo";
    }
}