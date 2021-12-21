<?php
    require_once 'db/conn.php';
    //get values from post
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $home_address = $_POST['home_address'];
        $gender = $_POST['gender'];

        $result = $crud->editSubscriber($id, $fname, $lname, $email, $home_address, $gender);

        if($result){
            header("Location: admin.php");
        }
        else{
            include 'includes/errormessage.php';  
        }
    }
    else{
        include 'includes/errormessage.php';  
    }
        
?>