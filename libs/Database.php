<?php
    class Database{
        
    function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "test";
        $dbname = "PRIISH";
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
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
        $result=mysqli_query($this->conn,$query);

        if(mysqli_num_rows($result)>0){
            return $result;
        }
        return false;
    }


}

?>