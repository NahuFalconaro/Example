<?php

    class tpeModelComment{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=proyectoweb;charset=utf8', 'root', '');
        }

        function getComentarios(){
            //preparo la consulta
            $query = $this->db->prepare('SELECT * FROM comentario ORDER BY puntaje DESC');
    
            //ejecuto la consulta
            $query->execute();
    
            //obtengo la respuesta 
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        function getComentario($id){
            //preparo la consulta
            $query = $this->db->prepare('SELECT * FROM comentario WHERE id_comentario=? ');
    
            //ejecuto la consulta
            $query->execute(array($id));
    
            //obtengo la respuesta 
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        //function getPromedio($id){
            //preparo la consulta
          //  $query = $this->db->prepare('SELECT avg(puntaje) FROM comentario where id_producto_fk = 3');
    
            //ejecuto la consulta
            //$query->execute(array($id));
    
            //obtengo la respuesta 
            //$result = $query->fetchAll(PDO::FETCH_OBJ);
            //return $result;
        //}
        
        function insertComentario($comentario,$puntaje,$id){
            $sentencia = $this->db->prepare("INSERT INTO comentario(comentario, puntaje, id_producto_fk) VALUES(?,?,?)");
            $sentencia->execute(array($comentario,$puntaje,$id));
            return $this->db->lastInsertId();
        }

        function deletComentario($id){
            $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
            $sentencia->execute(array($id));
        }
    }
