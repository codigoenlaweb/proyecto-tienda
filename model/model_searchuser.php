<?php
    namespace model;
    class model_searchuser{
        public static function search_user($valor1, $valor2){
            $sql= "SELECT * FROM user WHERE $valor1 = '$valor2'";
            $mysql= mysqli_query(db::connect(), $sql);
            if ($mysql) {
                return mysqli_fetch_object($mysql);
            }
        }
    }

?>