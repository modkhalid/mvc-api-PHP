<?php
// require "libs/Controller.php";
class Bootstrap {
    function __construct(){
        $url=explode('/',rtrim($_GET['url'],'/'));
        

        if(empty($url[0])){
            require 'controllers/index.php';
            $controller=new Index;
            exit;
        }


        $file="controllers/".$url[0].".php";
       
        if(file_exists($file)){
            require $file;
        }else{
            require 'controllers/error.php';
            $controller=new Errors;
            exit;
        }

        $controller=new $url[0];
        array_shift($url);
        $controller->call($url);
    }

    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR MAIN PAGE
    */
}
?>