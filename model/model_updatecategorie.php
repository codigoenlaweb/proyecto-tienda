<?php
    namespace model;
    class model_updatecategorie
    {
        public static function update($name_category, $number_category){
            $sql= "UPDATE `category` SET `category`='$name_category' WHERE id= $number_category";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>