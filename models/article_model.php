<?php

class ArticleModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    


    public function select($param=false)
    {
        if($param){
            $query="SELECT * FROM article where article_id='$param' order by time DESC";

            
        }else{
            $query="SELECT * FROM article order by time DESC";
        }
        // echo $query;

        $response=$this->db->select($query);
        

        $main=array();
        if($response){
            while($row=mysqli_fetch_assoc($response)){
                $array=array(
                    'id'=>$row['article_id'],
                    'header'=>$row['article_header'],
                    'body'=>$row['article_body']
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





    public function insert($param){
        $id=uniqid(rand(0,100000000000000000));
        $query="INSERT INTO article (article_id,article_header,article_body) values ('$id','$param->head','$param->text')";
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
        $query="DELETE FROM comment where article_id='$param'";
        $this->db->delete($query);
        
    }


    public function update($param){
        $query="UPDATE `article` SET `article_header`='$param->header',`article_body`='$param->body' WHERE `article_id`='$param->id'";
        $this->db->update($query);
        
    }
}