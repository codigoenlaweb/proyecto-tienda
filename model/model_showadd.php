<?php
    namespace model;
    class model_showadd
    {
        public static function showadd($name_table){
            $sql= "SELECT * FROM $name_table";
            $query= mysqli_query(db::connect(), $sql);
            return mysqli_fetch_object($query);
        }
    }
    

?>