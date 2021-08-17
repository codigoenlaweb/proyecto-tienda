<?php
    namespace controller;
    abstract class controller_cleansession
    {
        public static function clean_session(){
            $_SESSION['alert_error']= '';
            $_SESSION['alert_ok']= '';

        }
        
        public static function clean_sessionloging(){
            $_SESSION['user_session']= '';
            unset($_SESSION['shopping']);
        }
    }
    

?>