<?php
    namespace model;
    class model_carrito
    {
        public $idproduct;
        public $cantproduct;

        public function get_idproduct(){
            return $this->idproduct;
        }
        public function set_idproduct($idproduct){
            $this->idproduct=$idproduct;
        }

        public function get_cantproduct(){
            return $this->cantproduct;
        }
        public function set_cantproduct($cantproduct){
            $this->cantproduct=$cantproduct;
        }
    }
    

?>