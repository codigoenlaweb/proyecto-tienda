<?php
    namespace model;
    class model_order
    {
        public $user;
        public $user_id;
        private $city;
        private $address;
        private $priceall;
        private $estado;

        public function get_user(){
            return $this->user;
        }
        public function set_user($user){
            return $this->user=$user;
        }

        public function get_user_id(){
            return $this->user_id;
        }
        public function set_user_id($user_id){
            return $this->user_id=$user_id;
        }

        public function get_city(){
            return $this->city;
        }
        public function set_city($city){
            return $this->city=$city;
        }

        public function get_address(){
            return $this->address;
        }
        public function set_address($address){
            return $this->address=$address;
        }

        public function get_priceall(){
            return $this->priceall;
        }
        public function set_priceall($priceall){
            return $this->priceall=$priceall;
        }

        public function get_estado(){
            return $this->estado;
        }
        public function set_estado($estado){
            return $this->estado=$estado;
        }

        public static function insert_order($id_usuario, $city, $address, $priceall){
            $error= 0;
            $sql="INSERT INTO `order`(`id_usuario`, `ciudad`, `direccion`, `precio_total`, `estado`, `fecha`, `hora`) VALUES ($id_usuario,'$city','$address', $priceall,'confirm', CURDATE() , CURTIME())";
            $mysql= mysqli_query(db::connect(), $sql);
            if ($sql) {
                return $mysql;
            }else {
                return $error++;
            }
        }

        public static function lastorder($id_usuario)
        {
            $sql="SELECT * FROM `order` WHERE id_usuario = $id_usuario ORDER BY id DESC LIMIT 1";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function insert_orderline($id_pedido)
        {
            foreach ($_SESSION['shopping'] as $indice => $elemento){
                $id_producto = $_SESSION['shopping'] [$indice] ['id_product'];
                $unidad= $_SESSION['shopping'] [$indice] ['cant'];
                $buyall= $_SESSION['shopping'] [$indice] ['cant'] * $_SESSION['shopping'] [$indice] ['price'];

                $insert = "INSERT INTO `line_order`(`id_pedido`, `id_producto`, `unidad`, `precio_liena_pedido`) VALUES ('$id_pedido','$id_producto','$unidad','$buyall')";
                $mysql= mysqli_query(db::connect(), $insert);
            }
        }

        public static function show_estado()
        {
            $sql = "SELECT id, estado FROM `order` ORDER BY id DESC LIMIT 1";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function show_order($id_usuario)
        {
            $sql = "SELECT * FROM `order` WHERE id_usuario = $id_usuario";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function show_allorder()
        {
            $sql = "SELECT * FROM `order`";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function show_detailorder($id_pedido)
        {
            $sql = "SELECT * FROM `order` WHERE id = $id_pedido";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function show_detail_inlineorder($id_pedido)
        {
            $sql = "SELECT li.id_pedido, li.unidad, li.precio_liena_pedido, pr.nombre_producto, pr.imagen  FROM `line_order` li INNER JOIN `product` pr ON pr.id = li.id_producto WHERE li.id_pedido = $id_pedido";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }

        public static function update_stateorder($id_order)
        {
            $sql = "UPDATE `order` SET `estado`='enviado' WHERE $id_order";
            $mysql= mysqli_query(db::connect(), $sql);
            return $mysql;
        }
    }
    

?>