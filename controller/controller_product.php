<?php
    namespace controller;
    if (!isset($_SESSION)){ session_start();}
    use model\model_allproduct;
    use model\model_createproduct;
    use model\model_deleteproduct;
use model\model_oneproduct;
use model\model_showproductcategory;
use model\model_updateproduct;

class controller_product
    {
        public static function showproduct(){
            $product = model_allproduct::showadd();
            return $product;
        }

        public static function oneproduct(){
            $product = model_oneproduct::one($_GET['id']);
            return $product;
        }

        public static function oneproductcarr($id_product){
            $product = model_oneproduct::one($id_product);
            return $product;
        }
        

        public static function showproductcategory(){
            $product = model_showproductcategory::show($_GET['id']);
            return $product;
        }

        public static function createproduct(){
            $error= 0;
            if (empty($_POST['oferta-p'])) {
                $_POST['oferta-p']= 0;
            }
            if (isset($_POST)) {
                if (!empty($_POST['name-p']) && !empty($_POST['description-p']) && !empty($_POST['price-p']) && !empty($_POST['stock-p'])) {
                    $file = $_FILES['image-p'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    
                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
        
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }

                    model_createproduct::create($_POST['category-p'], $_POST['name-p'], $_POST['description-p'], $_POST['price-p'], $_POST['stock-p'], $_POST['oferta-p'], $filename);
                }else {
                    $error++;
                }
            }else {
                $error++;
            }
            header('location:../manageproduct.php');
        }

        public static function deletecategory(){
            if (isset($_GET)) {
                if (!empty($_GET['id'])) {
                    model_deleteproduct::delete(($_GET['id']));
                    header('location:../manageproduct.php');
                }else {
                    header('location:../manageproduct.php');
                }
            }
        }

        public static function updateproduct($id){
            $error= 0;
            if (empty($_POST['oferta-p'])) {
                $_POST['oferta-p']= 0;
            }
            if (isset($_POST)) {
                if (!empty($_POST['name-p']) && !empty($_POST['description-p']) && !empty($_POST['price-p']) && !empty($_POST['stock-p'])) {
                    $file = $_FILES['image-p'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    
                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
        
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }

                    model_updateproduct::update($_POST['category-p'], $_POST['name-p'], $_POST['description-p'], $_POST['price-p'], $_POST['stock-p'], $_POST['oferta-p'], $filename, $id);
                }else {
                    $error++;
                }
            }else {
                $error++;
            }
            header('location:../manageproduct.php');
        }
        
    }

    
    

?>