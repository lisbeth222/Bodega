<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="SELECT * from productos  INNER JOIN bodega ON productos.bodega_id = bodega.bodega_id ";
        $sql=$conectar ->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
        public function get_categoria_x_id($producto_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * from productos where bodega_id=2 AND producto_id = ? ";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $producto_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($nombre, $descripcion){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO productos (producto_id, nombre, descripcion, cantidad, precio, bodega_id) VALUES (6,?,?,11, NULL, 3);";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2,  $descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($producto_id, $nombre, $descripcion){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos set nombre = ?, descripcion = ? where producto_id = ? ";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2,  $descripcion);
            $sql->bindValue(3,  $producto_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_categoria($producto_id, ){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM productos WHERE producto_id= ?";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $producto_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
}

?>