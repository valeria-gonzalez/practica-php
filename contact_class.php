<?php
    class Contact {
        public $name;
        public $email;
        public $gender;
        public $password;
        public $comment;
        public $city;
        public $hire;

        public function __construct($name, $email, $gender, 
                        $password, $comment, $city, $hire){
            $this -> name = $name;
            $this -> email = $email;
            $this -> gender = $gender;
            $this -> password = $password;
            $this -> comment = $comment;
            $this -> city = $city;
            $this -> hire = $hire;
        }
    }

?>