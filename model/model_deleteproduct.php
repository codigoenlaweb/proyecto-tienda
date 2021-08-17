<?php
    namespace model;
    class model_deleteproduct
    {
        public static function delete($number_product){
            $sql= "DELETE FROM `product` WHERE id= $number_product";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>