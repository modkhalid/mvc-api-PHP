<?php
class Login extends Controller{
    function __construct(){
        parent::__construct();
    }

    public function call($job=false)
    {
        require 'models/'.strtolower(get_class($this)).'_model.php';
        $model=get_class($this)."Model";

        $response=new $model();

        $response->select(json_decode(file_get_contents('php://input')));
    }
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR LOGIN USER
    */
}


?>