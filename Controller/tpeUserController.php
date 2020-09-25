<?php
require_once "./Model/tpeModel.php";
require_once "./Model/tpeModelUser.php";
require_once "./Model/tpeModelDificultad.php";
require_once "./View/tpeUserView.php";
require_once "./Controller/tpeController.php";

class tpeUserController {

    private $modelDificultad;
    private $modelUser;
    private $view;

	function __construct(){
        $this->modelDificultad = new tpeModelDificultad();
        $this->modelUser = new tpeModelUser();
        $this->view = new tpeUserView();
    }
    
    public function IniciarSesion(){
        $password = $_POST['pass'];
        $usuario = $this->modelUser->GetPassword($_POST['user']);

        if (isset($usuario) && $usuario != null){
            $md5_user = md5($password);
            if ($md5_user == $usuario->pass){
                session_start();
                $_SESSION['user'] = $usuario->user;
                $_SESSION['userId'] = $usuario->id_user;
                header("Location: " . URL_HOME);
            }
            else{
                header("Location: " . URL_LOGIN);
                echo "Pass incorrecta";
            }
        }else{
            header("Location: " . URL_LOGIN);
            echo "User incorrecto";
        }
       // header("Location: " . BASE_URL);
    }

    function insertUser(){
        $this->modelUser->insertUser($_POST['user'], $_POST['pass']);
        $this->IniciarSesion();
        header("Location: " . BASE_URL . "rutinas");
    }

    function displayUsuarios(){
        $users = $this->modelUser->getUsers();
        $loged = $this->checkLoged();
        $this->view->displayUser($users,$loged);
    }

    public function Login(){
        $loged = $this->checkLoged();
        $this->view->DisplayLogin($loged);
    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }   

    function checkLoged(){
        session_start();
        if(isset($_SESSION['userId'])){
            $loged = $this->modelUser->getUser($_SESSION['userId']);
            return $loged->permiso;
        }else 
            return "anonimo";
    }
    function modificarPermiso($id){
        $this->modelUser->modificarPermiso($id);
        header("Location:".BASE_URL ."usuario");
    }
    function deleteUser($id){
        $this->modelUser->deleteUser($id);
        header("Location: " . BASE_URL . "usuario");
    }
    
}
