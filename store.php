<?php
    header("Location: formulario.php");
    require('connection.php');

    function get_data(){
        $name = $email = $gender = $password = $comment = $city = $hire = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['name']) ) $name = $_POST['name'];
            if(isset($_POST['email'])) $email = $_POST['email'];
            if(isset($_POST['check'])) $gender = $_POST['check'];
            if(isset($_POST['password'])) $password = $_POST['password'];
            if(isset($_POST['comment'])) $comment = $_POST['comment'];
            if(isset($_POST['city'])) $city = $_POST['city'];
            $hire = isset($_POST['hire']) ? $_POST['hire'] : 0;
        }

        $contact = [
                    "name" => $name, 
                    "email" => $email, 
                    "gender" => $gender, 
                    "password" => $password, 
                    "comment" => $comment, 
                    "city" => $city, 
                    "hire" => $hire
                    ];
        
        return $contact;
    }

    function insert_contact_database($contact){
        $conn = connect_database();

        if($conn){
            $name = $contact["name"];
            $email = $contact["email"];
            $gender = $contact["gender"];
            $password = $contact["password"];
            $comment = $contact["comment"];
            $city = $contact["city"];
            $hire = $contact["hire"];

            // create sql sentence
            try{
                $query = "INSERT INTO contacts (name, email, gender, password, comment, city, hire)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                
                $stmnt = $conn->prepare($query);
                $stmnt->execute([$name, $email, $gender, $password, $comment, $city, $hire]);
            } catch (PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }
            $conn = null;
        }
    }

    $contact = get_data();
    insert_contact_database($contact);

    exit;
?>