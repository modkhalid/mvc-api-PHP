<?php

class Errors extends Controller{
    function __construct(){
        parent::__construct();
        echo "this is inside the error folder<br>";
        $this->view->msg="this page is not exists";
        $this->view->render('error/index');
    }
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR COMMENT OF AN Error
    */
}