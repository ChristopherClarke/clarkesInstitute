<?php
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){     
        include 'includes/errormessage.php';   
        header("Location: admin.php");      
    }else{
     $id = $_GET['id'];
     
     $result = $crud->deleteSubscriber($id);

     if($result){
        header("Location: admin.php");
        }
     else{
        include 'includes/errormessage.php';  
        }

    }

    ?>