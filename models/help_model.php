<?php

class HelpModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    public function select($param=false)
    {
        if($param){
            $query="SELECT * FROM hash_table where hash_id='$param'";
            
        }else{
            $query="SELECT * FROM hash_table ";
        }

        $response=$this->db->select($query);
        $main=array();
        if($response){
            // $main=array();
            while($row=mysqli_fetch_assoc($response)){
                $array=array(
                    'id'=>$row['hash_id'],
                    'word'=>$row['hash_word']
                );
                array_push($main,$array);
            }
            
        }else{
            array_push($main,array(
                'id'=>false,
                'word'=>" Please porvide valid id"
            ));
        }

        echo json_encode($main);
        return json_encode($main);
    }
}