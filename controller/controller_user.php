<?php
    namespace controller;
    if (!isset($_SESSION)){ session_start();}
    use model\db;
    use model\model_showadd;
    use model\model_repeateregistration;
    use model\model_insertregistration;
use model\model_oneuser;
use model\model_searchuser;
    use mysqli;

class controller_user
    {
        public $name;
        private $password;
        private $email;
        private $img;
        private $role;

        public function get_name(){
            return $this->name;
        }
        public function set_name($name){
            return $this->name=$name;
        }

        public function get_password(){
            return $this->password;
        }
        public function set_password($password){
            return $this->password=$password;
        }

        public function get_email(){
            return $this->email;
        }
        public function set_email($email){
            return $this->email=$email;
        }

        public function get_img(){
            return $this->img;
        }
        public function set_img($img){
            return $this->img=$img;
        }

        public function get_role(){
            return $this->role;
        }
        public function set_role($role){
            return $this->role=$role;
        }

        public function validate(){
            $error= 0;
            /*Si existe $_POST comienza la validacion, de lo contrario te regreso */
            if (isset($_POST)) {

                /*validacion del nombre de usuario */
                if (empty($_POST['name'])) {
                    $error++;
                    $alert_error['name'] = 'El nombre no puede ir vacio';
                }elseif (model_repeateregistration::repeateregistration('user',$_POST['name'])) {
                    $error++;
                    $alert_error['name'] = 'El nombre de usuario ya esta en uso';
                }else {
                    $name_r= $_POST['name'];
                }

                /*validacion del email */
                if (empty($_POST['email'])) {
                    $error++;
                    $alert_error['email'] = 'El email no puede ir vacio';
                }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error++;
                    $alert_error['email'] = 'El formato del correo es invalido';
                }elseif (model_repeateregistration::repeateregistration('email',$_POST['email'])) {
                    $error++;
                    $alert_error['email'] = 'El correo ya esta registrado';
                }else {
                   $emeail_r= $_POST['email'];
                }

                /*validacion de contraseña */
                if (empty($_POST['password'])) {
                    $error++;
                    $alert_error['password'] = 'La contraseña no puede ir vacia';
                }elseif (strlen($_POST['password']) < 6) {
                    $error++;
                    $alert_error['password'] = 'La contraseña debe contener minimo 6 caracteres';
                }elseif (strlen($_POST['password']) > 20) {
                    $error++;
                    $alert_error['password'] = 'La contraseña no puede contener mas de 20 caracteres';
                }else {
                    $password_r= $_POST['password'];
                }
            }

            if ($error != 0) {
                header('location:../registration.php');
                $_SESSION['alert_error']= $alert_error; 
            }else {
                $passwordseg= password_hash($password_r, PASSWORD_BCRYPT, ['cost'=>10]);
                $passwordseg_r= $passwordseg;
                $insert= model_insertregistration::insert_registration($name_r, $passwordseg_r, $emeail_r);
                if ($insert) {
                    $_SESSION['alert_ok']= 'Te has registrado con exito';
                    header('location:../index.php');
                }else {
                    $alert_error ['error']= 'Hubo un problema con el registro... por favor intente de nuevo';
                    $_SESSION['alert_error']= $alert_error;
                }     
            }
        }
           
        public function login()
        {
            $error= 0;
            if (isset($_POST)) {
                if (!empty($_POST['name']) && !empty($_POST['password'])) {
                    if (model_searchuser::search_user('user',$_POST['name'])) {
                        $user= model_repeateregistration::repeateregistration('user',$_POST['name']);
                        if ($error == 0 && $user) {
                            $passw= $user->password;
                            $verify_password= password_verify($_POST['password'], $passw);
                            if ($verify_password) {
                                $this->name= $user->user;
                                $this->password= $user->password;
                                $this->email= $user->email;
                                $this->role= $user->role;
                                $this->img= $user->img;
                                $session_user ['name']= $this->name;
                                $session_user ['password']= $this->password;
                                $session_user ['email']= $this->email;
                                $session_user ['role']= $this->role;
                                $session_user ['img']= $this->img;
                                $_SESSION['user_session'] = $session_user;
                                $alert_ok= 'correcto';
                            }else {
                                $error++;
                                $alert_error['password_confirm'] = 'La contraseña es incorecta';
                            }
                        }
                    }else {
                        $error++;
                        $alert_error['name_confirm'] = 'El nombre de usuario es incorecto';
                    }

                }else {
                    $alert_error['empty'] = 'rellene todos los campos';
                    $error++;
                }
                
            }else {
                $error++;
            }

            if ($error != 0) {
                $_SESSION['alert_error']= $alert_error;
                header('location:../index.php');
            }else{
                header('location:../index.php');
                $_SESSION['alert_ok']= $alert_ok;
            }
        }

        public static function oneuser(){
            return model_oneuser::one($_SESSION['user_session']['name']);
        }
    }
    

?>