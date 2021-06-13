<?php
    namespace App;
    class Setting 
    {
        function connectDB(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "iceberg_test";
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            return $conn;
        }

        function InsertIndex($sql){
            $conn = Setting::connectDB();
            $result = $conn->query($sql);
            return $result;
        }
        function QueryIndex($sql){
            $conn = Setting::connectDB();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return json_encode($result->fetch_assoc());
            }
        }
        
        function route(){
            return $_SERVER['REQUEST_URI'];
        }   
        function method(){
            return $_SERVER['REQUEST_METHOD'];
        }
    }    
?>