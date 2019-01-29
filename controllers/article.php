<?php
class Article extends Controller{
    function __construct(){
        parent::__construct();
    }

    public function call($job=false)
    {
        require 'models/'.strtolower(get_class($this)).'_model.php';
        $model=get_class($this)."Model";
        $response=new $model();
        if(!isset($job[0])){
            $job[0]='get';
        }
        // print_r($job);
        
        switch($job[0]){
            case 'get':
                // echo $job[1];
                if(isset($job[1])){
                    $response->select($job[1]);
                }else{
                    $response->select();
                }
                break;

            case 'post':
                $response->insert(json_decode(file_get_contents('php://input')));
                // echo json_encode(array(array(
                //     'id'=>40487987,
                //     'status'=>'invalid url'
                // ))); 
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

            // case 'post':
            //     // $response->insert(json_decode(file_get_contents('php://input')));
            // // echo file_get_contents('php://input');
            // echo json_encode(array(array(
            //         'id'=>404,
            //         'status'=>'invalid url'
            //     ))); 


            default:
                echo json_encode(array(array(
                    'id'=>404,
                    'status'=>'invalid url'
                ))); 
            
        }
        

    }
}
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR  AN ARTICLE
    */

?>