<?php
/*
 * Base Controller
 * Loads the models and views
 */

 class Controller {
     // Load model
     public function model($model){
         // Require model file
         require_once '../app/models/' . $model . '.php';

         // Instatiate model 
         return new $model();
         //new Post();

     }

     // Load view
     public function view($view, $data = []){
        // Check for view file
        if(file_exists('../app/views/'. $view . ".php")){
            require_once '../app/views/' . $view . '.php';
        }else {
            // View does not exist
            die("View does not exist");
        }
     }

     public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;

        redirect('pages/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else {
            return false ;
        }
    }
 }