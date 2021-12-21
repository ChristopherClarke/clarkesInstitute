<?php

    class user{
        private $db;

        //initialize variables to the db connection
        function __construct($conn){
            $this-> db = $conn;
        }

        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        

    }


?>