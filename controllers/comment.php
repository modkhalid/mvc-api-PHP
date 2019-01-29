<?php
class Comment extends Controller{
    function __construct(){
        parent::__construct();
    }

    public function call($job=false)
    {
        require 'models/'.strtolower(get_class($this)).'_model.php';
        $model=get_class($this)."Model";

        $response=new $model();


        $job=strtolower($_SERVER['REQUEST_METHOD']);
        // echo $job12;
        
        switch($job){
            case 'get':
            	$response->select(json_decode(file_get_contents('php://input')));
                break;

            case 'post':
                $response->insert(json_decode(file_get_contents('php://input')));
                break;

            case 'put':
                $response->update(json_decode(file_get_contents('php://input')));
                break;

            case 'delete':
                $response->delete()(json_decode(file_get_contents('php://input')));
                break;


            default:
                echo json_encode(array(array(
                    'id'=>404,
                    'status'=>'invalid url'
                ))); 
            
        }
        

    }
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR COMMENT OF AN ARTICLE
    */
}


?>