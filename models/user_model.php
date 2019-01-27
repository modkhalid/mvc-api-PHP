<?php
/**
 * 
 */
class UserModel extends Model
{
	
	function __construct()
	{
		 parent::__construct();
	}

	public function get($param=false){
		if($param){
			$query="SELECT * FROM customer where customer_id='$param'";
		}else{
			$query="SELECT * FROM customer";
		}

		$response=$this->db->select($query);
		$main=array();
		if($response){
			while($row=mysqli_fetch_assoc($response)){
                $array=array(
                    'name'=>$row['name'],
                    'email'=>$row['email']
                );
                array_push($main,$array);
            }
		}else{
			array_push($main, array(
				'email'=>'-------',
				'name'=>'-------'
			));
		}

		echo json_encode($main,JSON_PRETTY_PRINT);
	}


}