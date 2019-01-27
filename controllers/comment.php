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
        if(!isset($job[0]) ){
            echo json_encode(array(array(
	            'id'=>404,
	            'status'=>'invalid artcle link id'
	        ))); 
	        return;

        }

        
        switch($job[0]){
            case 'get':
            	// if(!isset($job[1])){

            	// }
             //    if(isset($job[2])){
             //    	$response->select($job[1],$job[2]);
             //    }else{
             //    	$response->select($job[1]);
             //    }
            	$response->select(json_decode(file_get_contents('php://input')));
                break;

            case 'post':
                $response->insert(json_decode(file_get_contents('php://input')));
                break;

            case 'update':
                $response->update(json_decode(file_get_contents('php://input')));
                // echo "string";
                break;

            case 'delete':
                if(!isset($job[1])){
                    echo json_encode(array(array(
                        'id'=>404,
                        'error'=>"invalid url access"
                    )));

                }else{
                    $response->delete($job[1]);
                }
                break;


            default:
                echo json_encode(array(array(
                    'id'=>404,
                    'status'=>'invalid url'
                ))); 
            
        }
        

    }
}


?>