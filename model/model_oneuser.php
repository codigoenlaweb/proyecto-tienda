<?php
    namespace model;
    class model_oneuser
    {
        public static function one($user){
            $sql= "SELECT * FROM user WHERE user= '$user'";
            $query= mysqli_query(db::connect(), $sql);
            return $query;
        }
    }
    

?>