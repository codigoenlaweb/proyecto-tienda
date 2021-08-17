<?php
    namespace controller;
    use controller\controller_user;
    use model\model_order;

    class controller_order
    {
        public static function order()
        {
            if (!isset($_SESSION['user_session']) && empty($_SESSION['user_session'])) {
                echo 'Debes iniciar sesion para hacer este paso';
            
            }else {
                $user= mysqli_fetch_object(controller_user::oneuser());
                $order= new model_order;
                $order->set_user($_SESSION['user_session']['name']);
                $order->set_user_id($user->id);
                $order->set_city($_POST['city']);
                $order->set_address($_POST['address']);
                $order->set_priceall($_SESSION['priceall']);

                model_order::insert_order($order->get_user_id(), $order->get_city(), $order->get_address(), $order->get_priceall());
                $lastorder= mysqli_fetch_object(model_order::lastorder($order->get_user_id()));

                model_order::insert_orderline($lastorder->id);
            }
        }

        public static function showorder()
        {
            $user_id= mysqli_fetch_object(controller_user::oneuser());
            return model_order::show_order($user_id->id);
        }

        public static function showallorder()
        {
            return model_order::show_allorder();
        }

        public static function showdetailorder()
        {
            $order_id= $_GET['id'];
            return model_order::show_detailorder($order_id);
        }

        public static function showdetail_inlineorder()
        {
            $order_id= $_GET['id'];
            return model_order::show_detail_inlineorder($order_id);
        }

        public static function update_stateorder()
        {
            $order_id= $_GET['id'];
            return model_order::update_stateorder($order_id);
        }

    }
    

?>