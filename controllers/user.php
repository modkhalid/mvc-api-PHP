<?php
	class User extends Controller{
		function __construct()
		{
			parent::__construct();
			// echo "call from the User";
		}
		public function call($job=false){
			require 'models/'.strtolower(get_class($this)).'_model.php';
        	$model=get_class($this)."Model";
        	$response=new $model;

        	if(!$job){

        	}else{

	        	switch ($job[0]) {
	        		case 'get':
	        			if(isset($job[1])){
	        				$response->get($job[1]);
	        			}else{
	        				$response->get();
	        			}
	        			break;
	        		
	        		
	        		case 'post':
	        			echo $_POST['email'];
	        			break;
	        	}
	        }


		}
	}


?>