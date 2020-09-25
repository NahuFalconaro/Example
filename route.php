<?php
    require_once "Controller/tpeController.php";
    require_once "Controller/tpeUserController.php";

    define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("URL_HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $action = $_GET["action"];

    $controller = new tpeController();
    $userController = new tpeUserController();

    if($action == ''){
        $controller->displayLogin();
    }
    else if ($action == 'home'){
        $controller->displayIndex();
    }
    else if ($action == 'rutinas'){
        $controller->displayTablaEjercicios();
    }
    else if ($action == 'tienda'){
        $controller->displayTienda();
    }
    else if ($action == 'registro'){
        $controller->displayRegistro();
    }
    else if ($action == 'usuario'){
        $userController->displayUsuarios();
    }
    else if(isset($action)){
        $partes_url = explode('/', $action);
        if($partes_url[0] == 'insertarEjer'){
            $controller->insertEjercicio();
        }
        elseif($partes_url[0] == 'insertarDif'){
            $controller->insertDificultad();
        }
        elseif($partes_url[0] == 'insertarProducto'){
            $controller->insertProducto();
        }
        elseif($partes_url[0] == 'borrar'){
            $controller->deletEjercicio($partes_url[1]);
        }
        elseif($partes_url[0] == 'borrarDif'){
            $controller->deletDificultad($partes_url[1]);
        }
        elseif($partes_url[0] == 'verComentarios'){
            $controller->verComentarios($_POST['idproducto']);
        }
        elseif($partes_url[0] == 'borrarComment'){
            $controller->deleteComment($partes_url[1]);
        }
        elseif($partes_url[0] == 'insertarComment'){
            $controller->insertComment($_POST['idproducto']);
        }
        elseif($partes_url[0] == 'deletProducto'){
            $controller->deletProducto($partes_url[1]);
        }
        elseif($partes_url[0] == 'Guardar'){
            $controller->modificarID($partes_url[1]);
        }
        elseif($partes_url[0] == 'GuardarUsuario'){
            $userController->modificarPermiso($partes_url[1]);
        }
        elseif($partes_url[0] == 'GuardarDif'){
            $controller->modificarID_Dif($partes_url[1]);
        }
        elseif($partes_url[0] == 'registrar'){
            $userController->insertUser();
        }
        elseif($partes_url[0] == "iniciarSesion") {
            $userController->IniciarSesion();
        }
        elseif($partes_url[0] == "login") {
            $userController->Login();
        }    
        elseif($partes_url[0] == "logout") {
            $userController->Logout();
        }
        elseif($partes_url[0] == 'borrarUser'){
            $userController->deleteUser($partes_url[1]);
        }
    }
