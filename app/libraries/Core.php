<?php
/*
    * App Core Class
    * Creates URL & loads core controller
    * URL FORMAT - /controller/method/params
*/

class Core {
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [] ;

    public function __construct(){
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in controllers for first value
        if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
            // if exist, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }
    
        // Require the controller 
        require_once "../app/controllers/" . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;
        //$pages = new Pages;

        // Check for second part of url 
        if(isset($url[1])){
            // Check to see if method exists in controller
            if(method_exists($this-> currentController, $url[1])){
                $this->currentMethod = $url[1];

                // Unset 1 index
                unset($url[1]);
            }
        }

        //echo "<br />url : " . $this->currentMethod . "<br />";

        // Get params
        $this->params = $url ? array_values($url): [] ;
        // echo "<br /><br />". print_r($url) ;
        // echo "<br /><br />" . print_r(array_values($url)) ."<br />";

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
}

    public function getUrl(){
        //echo "_GET['url'] : " . $_GET['url'] . "<br/>";
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            //print_r($url);
            return  $url;
        }    
    }
}