<?php
    class crud{
        private $db;

        //initialize variables to the db connection
        function __construct($conn){
            $this-> db = $conn;
        }

        //insert new subscription records into db
        public function insertSubscribers($fname,$lname, $email, $home_address, $gender, $destination){
            try {
                $result = $this->getSubscriberbyEmail($email);
                if($result['num'] > 0){  
                   return false;
                }
                else{
                    $sql ="INSERT INTO subscribers(firstname, lastname, email, home_address, gender, profile_image) 
                    VALUES (:fname, :lname, :email, :home_address, :gender, :profile_image)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':fname', $fname);
                    $stmt->bindparam(':lname', $lname);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':home_address', $home_address);
                    $stmt->bindparam(':gender', $gender);
                    $stmt->bindparam(':profile_image', $destination);
                    $stmt->execute();
                    return true;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSubscriberbyEmail($email){
            try{
                $sql = "SELECT COUNT(*) AS num FROM subscribers WHERE email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //retirieve subscription records from db
        public function getSubscribers(){    
            try{        
                $sql = "SELECT * FROM `subscribers`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //retireve single subscriber from db
        public function getSubscriberDetails($id){
            try{
                $sql = "SELECT * FROM subscribers WHERE subscriber_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //update subscriber record
        public function editSubscriber($id, $fname, $lname, $email, $home_address, $gender){
            try{
                $sql = "UPDATE subscribers SET firstname = :fname, lastname = :lname, email = :email,
                            home_address = :home_address, gender = :gender WHERE subscriber_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':home_address', $home_address);
                $stmt->bindparam(':gender', $gender);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //delete subscriber
        public function deleteSubscriber($id){
            try{
                $sql = "DELETE from subscribers WHERE subscriber_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            
        
        }

    }


?>