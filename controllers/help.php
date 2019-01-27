<?php
class Help extends Controller{
    function __construct(){
        parent::__construct();
        // echo "we are inside help";
    }

    public function call($job=false)
    {
        require 'models/'.strtolower(get_class($this)).'_model.php';
        $model=get_class($this)."Model";
        $response=new $model();
        // $response->select($job[1]);
        if(!isset($job[0])){
            echo json_encode(array(array(
                'error'=>'invalid url'
            )));
            // echo 
            
            exit;
        }
        
        switch($job[0]){
            case 'get':
                if(isset($job[1])){
                    $response->select($job[1]);
                }else{
                    $response->select();
                }
                break;

            case 'post':
                $response->insert(json_decode(file_get_contents('php://input')));
            
        }
        

    }
}


?>