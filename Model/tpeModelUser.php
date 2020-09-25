<?php

    class tpeModelUser{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=proyectoweb;charset=utf8', 'root', '');
        }

        function getUsers(){
            $sentencia = $this->db->prepare( "SELECT * FROM usuario");
            $sentencia->execute();
            $users = $sentencia->fetchall(PDO::FETCH_OBJ);
            return $users;
        }

        public function getLoggedUserName() {
            
            if (session_status() != PHP_SESSION_ACTIVE)
                session_start();
            return $_SESSION['USERNAME'];
        }
    

        function getUser($id_user){
            $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE id_user=?");
            $sentencia->execute(array($id_user));
            $user = $sentencia->fetch(PDO::FETCH_OBJ);
            return $user;
        }

        public function GetPassword($user){
            $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE user=?");
            $sentencia->execute(array($user));
            $password = $sentencia->fetch(PDO::FETCH_OBJ);
            return $password;
        }

        function insertUser($user, $pass){
            $md5_pass = md5($pass);
            $sentencia = $this->db->prepare("INSERT INTO usuario(user, pass, permiso) VALUES(?,?,?)");
            $sentencia->execute(array($user,$md5_pass,"user"));
        }
        function modificarPermiso($id){
            $sentencia = $this->db->prepare("UPDATE usuario SET user=?,permiso=?  WHERE id_user=?");
            $sentencia->execute(array($_POST['user'],$_POST['permiso'],$id));
        }
        function deleteUser($id){
            $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_user=?");
            $sentencia->execute(array($id));
        }

    }
    