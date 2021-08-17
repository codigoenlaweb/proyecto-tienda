<?php
    namespace controller;
    if (!isset($_SESSION)){ session_start();}
    use model\model_carrito;

    class controller_carrito
    {
        public static function add(){
            $id_product= $_GET['id'];
            $cant_product= $_POST['cant_product'];
            if (isset($_SESSION['shopping'])) {
                $counter = 0;
                foreach ($_SESSION['shopping'] as $indice => $elemento) {
                    if ($elemento['id_product'] == $id_product) {
                        $_SESSION['shopping'] [$indice] ['cant'] = 0 + $cant_product;
                        $counter++;
                    }
                }
            }

            if (!isset($counter) || $counter == 0) {
                $product = new model_carrito;
                $product->set_idproduct($_GET['id']);
                $product->set_cantproduct($_POST['cant_product']);
                $produc = mysqli_fetch_object(controller_product::oneproduct());

                if (is_object($produc)) {
                    $_SESSION['shopping'][] = array(
                        'id_product' => $produc->id,
                        'price' => $produc->precio_unitario - ($produc->precio_unitario/100)*$produc->oferta,
                        'cant' => $product->get_cantproduct(),
                        'product' => $produc->nombre_producto,
                        'img' => $produc->imagen,
                        'offer' => $produc->oferta
                    );
                }
        
            }
            header('location:../index.php');
        }

        public static function update(){
            $id_product= $_GET['id'];
            $cant_product= $_POST['cant_product'];
            if (isset($_SESSION['shopping'])) {
                $counter = 0;
                foreach ($_SESSION['shopping'] as $indice => $elemento) {
                    if ($elemento['id_product'] == $id_product) {
                        $_SESSION['shopping'] [$indice] ['cant'] = 0 + $cant_product;
                        $counter++;
                    }
                }
            }
        }

        public static function delete(){
            unset($_SESSION['shopping']);
        }

        public static function count_product(){
            if (isset($_SESSION['shopping']) && !empty($_SESSION['shopping'])) :
                $count_product= '('.count($_SESSION['shopping']).')';
                return $count_product;
            endif;
        }
    }
    


?>