<?php
    require('connection.php');

    function retrieve_contacts(){
        $conn = connect_database();

        if($conn){
            try{
                $query = "SELECT * FROM contacts";
                $stmnt = $conn->prepare($query);
                $stmnt->execute();

                $stmnt->setFetchMode(PDO::FETCH_ASSOC);

                $table = $stmnt->fetchAll();

            } catch (PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
                $conn = null;
                return null;
            }
            
            $conn = null;
            return $table;
        }

    }


?>