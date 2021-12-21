<?php 
    $title='View Record';
    require_once 'includes/header.php';
    require_once 'includes/authenticated.php';
    require_once 'db/conn.php';

    //get subscriber by id
    if(!isset($_GET['id'])){ 
    
        include 'includes/errormessage.php';         
    }else{
        $id = $_GET['id'];
        $result = $crud->getSubscriberDetails($id);
 ?>

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 

                <button class="btn btn-secondary"> <img src="<?php echo empty($result['profile_image']) ? "uploads/defImage.png" : $result['profile_image'] ; ?>" height="200" width="200" /></button> 
                <span class="name mt-3"><b><?php echo $result['firstname'].' '. $result['lastname'] ?></b></span> 
                <span class="idd"><?php echo $result['email'] ?></span>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                <span class="idd1"><?php echo $result['gender'] ?></span> <span><i class="fa fa-copy"></i></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span ><?php echo $result['home_address'] ?></span> </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
        </div>
        <div class="text-center">
            <br>
        <a href="admin.php" class="btn btn-outline-dark btn-sm">Back to List</a>
        <a href="edit.php?id=<?php echo $result['subscriber_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete.php?id=<?php echo $result['subscriber_id'] ?>" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Are you sure you want to delete this subscriber?');" >Delete</a>
        </div>
    </div>
</div>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>