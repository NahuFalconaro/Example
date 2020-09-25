<?php

    class tpeModelDificultad{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=proyectoweb;charset=utf8', 'root', '');
        }

        function getDificultad(){
            //preparo la consulta
            $query = $this->db->prepare('SELECT * FROM dificultad');
    
            //ejecuto la consulta
            $query->execute();
    
            //obtengo la respuesta 
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        function insertDificultad($dificultad){
            $sentencia = $this->db->prepare("INSERT INTO dificultad(dificultad) VALUES(?)");
            $sentencia->execute(array($dificultad));
        }

        function deletDificultad($id){
            $sentencia = $this->db->prepare("DELETE FROM dificultad WHERE id_dificultad=?");
            $sentencia->execute(array($id));
        }

        function modificarDificultad($id){
            $sentencia = $this->db->prepare("UPDATE dificultad SET dificultad=?  WHERE id_dificultad=?");
            $sentencia->execute(array($_POST['dificult'],$id));
        }
    }