<?php
    class tpeModelTienda{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=proyectoweb;charset=utf8', 'root', '');
        }

        function getProductos(){
            $sentencia = $this->db->prepare("SELECT * FROM producto");
            $sentencia->execute();
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }
        function getProducto($id){
            $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
            $sentencia->execute(array($id));
            $producto = $sentencia->fetch(PDO::FETCH_OBJ);
            return $producto;
        }

        public function insertProducto($producto, $descripcion, $imagen = null) {
            $pathImg = null;
            if ($imagen){
                $pathImg = $this->uploadImage($imagen);
            }
            $query = $this->db->prepare('INSERT INTO producto(producto, descripcion, imagen) VALUES(?,?,?)');
            $query->execute([$producto, $descripcion, $pathImg]);
    
            return $this->db->lastInsertId();
        }

        private function uploadImage($image){
            $target = 'img/' . uniqid() . '.jpg';
            move_uploaded_file($image, $target);
            return $target;
        }

        function deletProducto($id){
            $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
            $sentencia->execute(array($id));
        }
    
    
    }