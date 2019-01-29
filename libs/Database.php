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
        // echo $query;
        if(mysqli_num_rows($result)>0){
            return $result;
        }
        return false;
    }

    public function delete($query){
        return mysqli_query($this->conn,$this->escape($query));        
    }


    public function update($query){
        $result=mysqli_query($this->conn,$query);
    }


    public function search($query){
        $result=mysqli_query($this->conn,$this->escape($query));
        // echo $query;
        if(mysqli_num_rows($result)>0){
            return true;
        }
        return false;
    }

    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR CONNECTION TO DATABASE
    */
}

?>