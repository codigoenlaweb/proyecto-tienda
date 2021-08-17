<?php
    namespace model;
    class model_updateproduct
    {
        public static function update($idcategoria, $nameproduct, $description, $price, $stock, $oferta, $img, $id){
            $sql= "UPDATE `product` SET `id_categoria`='$idcategoria',`nombre_producto`='$nameproduct',`descripcion`='$description',`precio_unitario`='$price',`stock`='$stock',`oferta`='$oferta',`imagen`='$img',`fecha`=CURDATE() WHERE id= $id";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    
?>