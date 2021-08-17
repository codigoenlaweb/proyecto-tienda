<?php
    namespace model;
    class model_oneproduct
    {
        public static function one($idproduct){
            $sql= "SELECT * FROM product WHERE id= $idproduct";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>