<?php 
    $title='Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
 //   require_once 'sendemail.php';
 // SendEmail::SendMail($email, 'Welcome to Clarke\'s Instutute', 'You have been subscribed successfully');
        
 ?>
 <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
         Subscription Completed successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>



    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 

                <!-- <button class="btn btn-secondary"> <img src="<?php echo empty($_SESSION['imagepath']) ? "uploads/defImage.png" : $_SESSION['imagepath'] ; ?>" height="200" width="200" /></button>  -->
               <button class="btn btn-secondary"> <img src="<?php echo $_SESSION['imagepath']; ?>" height="200" width="200" /></button> 
                <span class="name mt-3"><b><?php echo $_SESSION['firstname'].' '. $_SESSION['lastname'] ?></b></span> 
                <span class="idd"><?php echo $_SESSION['email'] ?></span>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                <span class="idd1"><?php echo $_SESSION['gender'] ?></span> <span><i class="fa fa-copy"></i></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span ><?php echo $_SESSION['home_address'] ?></span> </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
        </div>

        <div class="text-center">
        
            <br>
        <a href="index.php" class="btn btn-outline-info btn-sm"><-- Back to Home</a>
        </div>
    </div>
</div>
<?php
    unset($_SESSION["firstname"]);
    unset($_SESSION["lastname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["home_address"]);
    unset($_SESSION["gender"]);
    unset($_SESSION["imagepath"]);
?>



    <?php require_once 'includes/footer.php'; ?>