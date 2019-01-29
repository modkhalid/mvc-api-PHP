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
                    'title'=>$row['article_header'],
                    'body'=>$row['article_body']
                );
                array_push($main,$array);
            }

        }else{
            array_push($main,array(
                'id'=>null,
                'status'=>"NO data found"
            ));
        }

        echo json_encode($main);
        return json_encode($main);
    }




    public function insert($param){
        $id=uniqid(rand(0,100000000000000000));
        $title=$param->title;
        $body=$param->body;
        $response=false;

        if($title && $body){
            $query="INSERT INTO article (article_id,article_header,article_body) values ('$id','$param->title','$param->body')";
            $response=$this->db->insert($query);
        }

        else{
            echo json_encode(array(array(
                'id'=>null,
                'status'=>"title/body cannot be empty"
            )));
            return;
        }
        if(!$response){
            echo json_encode(array(array(
                'id'=>null,
                'status'=>"an error occur while posting data"
            )));
            return;
        }else{
            echo json_encode(array(array(
                'id'=>$id,
                'status'=>"200"
            )));
             return;
        }


    }




    public function delete($param){

        
        $sql="SELECT article_id FROM article where article_id='$param'";
        $response=$this->db->search($sql);
        // echo "";

        if($response){

            $query="DELETE FROM article where article_id='$param'";
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
        $query="UPDATE `article` SET `article_header`='$param->head',`article_body`='$param->text' WHERE `article_id`='$param->id'";
        $this->db->update($query);
        if(mysqli_affected_rows($this->db->conn)>0){
            echo json_encode(array(array(
                'message'=>"success",
                'status'=>"200"
            )));
            return;
        }else{
            echo json_encode(array(array(
                'message'=>"Update is not performed",
                'status'=>"404"
            )));
            return;
        }

    }
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR ARTICLE/MODEL
    */
}
