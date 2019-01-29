<?php

class CommentModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    public function select($param=false)
    {
        if(isset($param->comment_id) && isset($param->article_id)){
        	$query="SELECT * FROM comment where article_id='$param->article_id' and comment_id='$param->comment_id'";
        }else if(isset($param->article_id)){
        	$query="SELECT * FROM comment where article_id='$param->article_id'";
        }else{
            echo json_encode(array(array(
                'id'=>400,
                'word'=>"No permission to access this api"
            )));
            return;
        }            
        // echo "$query";
        $response=$this->db->select($query);
        

        $main=array();
        if($response){
            while($row=mysqli_fetch_assoc($response)){
                $array=array(
                    'id'=>$row['comment_id'],
                    'name'=>$row['name'],
                    'body'=>$row['content'],
                    'email'=>$row['email']
                );
                array_push($main,$array);
            }
            
        }else{
            array_push($main,array(
                'id'=>400,
                'word'=>" Please porvide valid id"
            ));
        }

        echo json_encode($main);
        return ;
    }


    public function insert($param){
        
        $id=uniqid(rand(0,100000000000000000));
        $query="INSERT INTO comment (comment_id,name,content,article_id,email) values ('$id','$param->name','$param->body','$param->id','$param->email')";

        $response=$this->db->insert($query);
        if(!$response){
            echo json_encode(array(array(
                'message'=>"an error occur while posting data",
                'error'=>"404"
            )));
        }else{
            echo json_encode(array(array(
                'message'=>"success",
                'status'=>"200"
            )));
        }
        

    }


    public function delete($param){
        $sql="select comment_id FROM comment where comment_id='$param->comment_id";
        $search=$this->db->search($sql);
        

        if($search){
            $query="DELETE FROM article where comment_id='$param->comment_id'";
            $this->db->delete($query);
            echo json_encode(array(array(
                'message'=>"success",
                'status'=>"200"
            )));
            return;

        }else{

            echo json_encode(array(array(
                'message'=>"Deletion is not performed",
                'status'=>"404"
            )));
            return;
        }
        
    }


    public function update($param){
        // $query="UPDATE `comment` SET `article_content`='$param->header',`article_body`='$param->body' WHERE `article_id`='$param->id'";
        // $this->db->update($query);
        echo json_encode(array(array(
            // "name"=>$query
            "message"=>"Update function is not ready"
        )));
    }


    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR COMMENT/MODEL
    */
}