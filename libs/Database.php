<?php
    class Database{
        
    function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "test";
        $dbname = "PRIISH";
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    }

    private function escape($str){
        // return mysqli_real_escape_string($this->conn,$str);
        return $str;
     
    }
    public function insert($query)
    {
        $result=mysqli_query($this->conn,$query);

        if($result){
            return $result;
        }
        return false;
    }

    public function select($query){
        $result=mysqli_query($this->conn,$this->escape($query));

        if(mysqli_num_rows($result)>0){
            return $result;
        }
        return false;
    }

    public function delete($query){
        mysqli_query($this->conn,$this->escape($query));

        if(mysqli_affected_rows($this->conn)>0){
            echo json_encode(array(array(
                'id'=>200,
                'status'=>"Success"
            )));
            return true;
        }else{
            echo json_encode(array(array(
                'id'=>404,
                'status'=>"error"
            )));  
            return false;
        }
        
    }


    public function update($query){
        $result=mysqli_query($this->conn,$query);

        // if(mysqli_num_rows($result)>0){
        //     return $result;
        // }
        // return false;
    }


}

?>