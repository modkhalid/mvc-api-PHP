<?php
// require "libs/Controller.php";
class Bootstrap {
    function __construct(){
        $url=explode('/',rtrim($_GET['url'],'/'));
        

        if(empty($url[0])){
            require 'controllers/index.php';
            $controller=new Index;

            // $controller->view->render('index/index');
            exit;
        }


        $file="controllers/".$url[0].".php";
       
        if(file_exists($file)){
            require $file;
        }else{
            // throw new Exception("the $file is not exist");
            // echo "Invalid url <u style='color:red;'>khalid/".$_GET['url']."</u><br>";
            require 'controllers/error.php';
            $controller=new Errors;
            exit;
        }
        // require ;
        $controller=new $url[0];


        // if(isset($url[2])){
            array_shift($url);
        //     $controller->call($url);
        // }else{
        //     if(isset($url[1])){
        //         $controller->call();
        //     }
        // }
        $controller->call($url);
    }
}
?>