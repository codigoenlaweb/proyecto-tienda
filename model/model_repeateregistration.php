<?php
    namespace model;
    class model_repeateregistration{
        public static function repeateregistration($valor1, $valor2){
            $sql= "SELECT * FROM user WHERE $valor1 = '$valor2'";
            $mysql= mysqli_query(db::connect(), $sql);
            if ($mysql) {
                return mysqli_fetch_object($mysql);
            }
        }
    }

?>