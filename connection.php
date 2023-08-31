<?php 
    function connect_database(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tarea1";
        $port = "33061";

        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
            return null;
        }
    }

?>
