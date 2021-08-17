<?php
    namespace model;
    class model_allcategory
    {
        public static function showadd(){
            $sql= "SELECT * FROM category";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>