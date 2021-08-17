<?php
    namespace model;
    class model_allproduct
    {
        public static function showadd(){
            $sql= "SELECT pr.id, pr.id_categoria, pr.nombre_producto, pr.precio_unitario, pr.oferta, pr.stock, pr.descripcion, pr.imagen, pr.fecha, ca.category FROM product pr INNER JOIN category ca ON ca.id = id_categoria ORDER BY pr.id DESC";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>