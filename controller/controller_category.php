<?php
    namespace controller;
    if (!isset($_SESSION)){ session_start();}
    use model\model_allcategory;
    use model\model_createcategorie;
    use model\model_deletecategorie;
    use model\model_showadd;
    use model\model_showviewcategory;
    use model\model_updatecategorie;

class controller_category
    {
        public static function showcategory(){
            $category = model_allcategory::showadd();
            return $category;
        }

        public static function createcategory(){
            if (isset($_POST)) {
                if (!empty($_POST['create-category'])) {
                    model_createcategorie::create($_POST['create-category']);
                    header('location:../managecategories.php');
                }else {
                    header('location:../managecategories.php');
                }
            }
        }

        public static function deletecategory(){
            if (isset($_GET)) {
                if (!empty($_GET['id'])) {
                    model_deletecategorie::delete($_GET['id']);
                    
                }
            }
            header('location:../managecategories.php');
        }

        public static function updatecategory(){
            if (isset($_POST)) {
                if (!empty($_POST['name-category']) && !empty($_POST['id-category'])) {
                    model_updatecategorie::update($_POST['name-category'], $_POST['id-category']);
                }
            }
            header('location:../managecategories.php');
        }

        public static function showviewcategory(){
            $category = model_showviewcategory::showadd($_GET['id']);
            return $category;
        }
    }
    

?>