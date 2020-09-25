<?php
    require_once('Router.php');
    require_once('./api/api.controller.php');

    $router = new Router();

    // rutas
    $router->addRoute("/comentarios", "GET", "commentApiController", "getComentarios");
    $router->addRoute("/comentarios/:ID", "GET", "commentApiController", "getComentario");
    $router->addRoute("/comentarios/:ID", "DELETE", "commentApiController", "deleteComentario");
    $router->addRoute("/comentarios", "POST", "commentApiController", "addComentario");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
