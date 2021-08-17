<?php
    namespace model;
    class model_createproduct
    {
        public static function create($idcategoria, $nameproduct, $description, $price, $stock, $oferta, $img){
            $sql= "INSERT INTO `product`(`id_categoria`, `nombre_producto`, `descripcion`, `precio_unitario`, `stock`, `oferta`, `imagen`, `fecha`) VALUES ('$idcategoria','$nameproduct','$description','$price','$stock','$oferta','$img', CURDATE())";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>