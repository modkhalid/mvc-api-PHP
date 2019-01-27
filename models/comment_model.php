<?php

class CommentModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    public function select($param=false)
    {
        if($param){
            if(isset($param->comment)){
            	$query="SELECT * FROM comment where article_id='$param->article' and comment_id='$param->comment'";
            }else{
            	$query="SELECT * FROM comment where article_id='$param->article'";
            }            
        }else{
           echo json_encode(array(array(
                'id'=>400,
                'error'=>"an error occur while posting data"
            )));
           return;
        }

        $response=$this->db->select($query);
        

        $main=array();
        if($response){
            while($row=mysqli_fetch_assoc($response)){
                $array=array(
                    'id'=>$row['comment_id'],
                    'name'=>$row['name'],
                    'comment'=>$row['content']
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
        $query="INSERT INTO comment (comment_id,name,content,article_id) values ('$id','$param->name','$param->content','$param->id')";

        $response=$this->db->insert($query);
        if(!$response){
            echo json_encode(array(array(
                'id'=>404,
                'error'=>"an error occur while posting data"
            )));
        }else{
            echo json_encode(array(array(
                'id'=>$id,
                'status'=>"ok"
            )));
        }
        

    }


    public function delete($param){
        $query="DELETE FROM article where article_id='$param'";
        $this->db->delete($query);
        
    }


    public function update($param){
        $query="UPDATE `article` SET `article_header`='$param->header',`article_body`='$param->body' WHERE `article_id`='$param->id'";
        $this->db->update($query);
        echo json_encode(array(array(
            "name"=>$query
        )));
    }
}