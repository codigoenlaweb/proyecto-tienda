<?php
    namespace model;
    class model_showviewcategory
    {
        public static function showadd($id){
            $sql= "SELECT * FROM category WHERE id = $id";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>