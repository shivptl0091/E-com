<?php

class Database
{

    // private $db_username = "root";
    // private $db_password = "";
    // private $host = "localhost";

    private $db_username = "u459015489_ecom";
    private $db_password = "Shiv@0603";
    private $host = "localhost";

    
    private $conn;

    public function __construct($db_name)
    {

        try {

            $dsn = "mysql:host={$this->host};dbname=u459015489_ecom";

            $this->conn = new PDO($dsn, $this->db_username, $this->db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // echo "Connection Success with $db_name";
            // echo "<br>";

        } catch (\Throwable $th) {
            echo "Error in contructure";
        }
    }

    // pagination and Search 
    function getdata($tablename, $limit = 0, $offset = 0, $where = "")
    {

        try {

            $query = "SELECT * FROM `$tablename`  $where";

            if ($limit != 0) {
                $query = "SELECT * FROM `$tablename`  $where LIMIT $offset,$limit ";
            }

            $res = $this->conn->prepare($query);
            $res->execute();
            $data = $res->fetchall(PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error in getdata $th";
        }
    }

    function getdataByid($tablename, $id)
    {

        try {

            $query = "SELECT * FROM `$tablename` WHERE id=$id";

            $res = $this->conn->prepare($query);
            $res->execute();
            $data = $res->fetchall(PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error in getdata $th";
        }
    }


    function execute($query)
    {

        try {
            $res = $this->conn->prepare($query);
            $res->execute();
            return true;
        } catch (\Throwable $th) {
            echo "Error in execute $th";

            return false;
        }
    }



    function get_data_from_query($query)
    {

        try {
            $res = $this->conn->prepare($query);
            $res->execute();
            $data = $res->fetchall(PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            echo "Error in execute $th";

            return false;
        }
    }

    // function deletedata($tablename, $id)
    // {
    //     try {
           
    //       $query = "DELETE FROM `$tablename` WHERE id=$id";
            
    //         $res = $this->conn->prepare($query);
    //         $res->execute();
    //         $data= $res->fetchall(PDO::FETCH_ASSOC);
    //         return $data;
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    // }






    // connection closed
    public function __destruct()
    {


        $this->conn = null;
        // echo "<br>";
        // echo "connection closed";
    }
}
