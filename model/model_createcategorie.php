<?php
    namespace model;
    class model_createcategorie
    {
        public static function create($name_category){
            $sql= "INSERT INTO `category`(`category`) VALUES ('$name_category')";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>