<?php
require_once("./Model/tpeModelComment.php");
require_once("./api/json.view.php");

class commentApiController {

    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new tpeModelComment();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getComentarios($params = null) {
        $comments = $this->model->getComentarios();
        $this->view->response($comments, 200);
    }

    public function getComentario($params = null) {
        $id = $params[':ID'];
        
        $comentario = $this->model->getComentario($id);        
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    } 

    public function deleteComentario($params = null) {
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);
        if ($comentario) {
            $this->model->deletComentario($id);
            $this->view->response("El comentario fue borrada con exito.", 200);
        } else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    }

    public function addComentario($params = null) {
        $data = $this->getData();

        $id = $this->model->insertComentario($data->comentario, $data->puntaje, $data->id_producto);
        
        $comentario = $this->model->getComentario($id);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario no fue creado", 500);

    }
}
