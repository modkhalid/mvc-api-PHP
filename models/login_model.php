<?php

class LoginModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function select($param=false)
    {
        if($param){
            $query="SELECT * FROM user where email='$param->email' and password='$param->password'";

            
        }else{
            echo json_encode(array(array(
                'id'=>404,
                'error'=>"bad request error"
            )));
            return;
        }

        $response=$this->db->select($query);
        

        if(!$response){
        	echo json_encode(array(array(
        		'status'=>400,
        		'error'=>"bad request error"
        	)));
        	return;
        }else{
        	
        	echo json_encode(array(array(
        		'status'=>200,
        		'token'=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0ZXN0MTIzIiwibmFtZSI6Im1vZGtoYWxpZCIsImlhdCI6MTUxNjIzOTAyN30.g3NXH7YXIn1wdLw3t_bTCYGWtgEAzd1FjFjMVMRxe_w'
        	)));
        	return;

        }

    
    }   
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR LOGIN/MODEL
    */

}
?>