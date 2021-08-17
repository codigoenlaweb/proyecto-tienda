<?php
    namespace model;
    class model_deletecategorie
    {
        public static function delete($number_category){
            $sql= "DELETE FROM `category` WHERE id= $number_category";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>