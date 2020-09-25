<?php

    class tpeModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=proyectoweb;charset=utf8', 'root', '');
        }

        function getEjerciciosDificultad(){
            $query = $this->db->prepare("SELECT ejercicio.*, dificultad.* FROM ejercicio INNER JOIN dificultad ON ejercicio.id_dificultad = dificultad.id_dificultad");
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        function insertEjercicio($musculo, $ejercicio, $serie, $repeticion, $id_dif){
            $sentencia = $this->db->prepare("INSERT INTO ejercicio(musculo, ejercicio, serie, repeticion, id_dificultad) VALUES(?,?,?,?,?)");
            $sentencia->execute(array($musculo,$ejercicio,$serie,$repeticion,$id_dif));
        }
    
        function deletEjercicio($id){
            $sentencia = $this->db->prepare("DELETE FROM ejercicio WHERE id_ejercicio=?");
            $sentencia->execute(array($id));
        }

        function modificarEjercicio($id){
            $sentencia = $this->db->prepare("UPDATE ejercicio SET musculo=?, ejercicio=?,serie=?,repeticion=?,id_dificultad=?  WHERE id_ejercicio=?");
            $sentencia->execute(array($_POST['muscle'],$_POST['ejer'],$_POST['ser'],$_POST['rep'], $_POST['id_dificultad'],$id));
        }
    }