<?php
    namespace model;
    class model_insertregistration
    {
        public static function insert_registration($name, $password, $email){
            $sql="INSERT INTO user(user, password, email, role) VALUES ('$name','$password','$email','user')";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }
    }
    

?>