<?php 
    $title='Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //get subscriber by id
    if(!isset($_GET['id'])){     
        include 'includes/errormessage.php';  
        header("Location: admin.php");
    }else{
     $id = $_GET['id'];
     $subscriber = $crud->getSubscriberDetails($id);
 ?>

<br>
<div class=" col-md-8 offset-md-2">
    <h1 class="text-center">Edit Record</h1>
    
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $subscriber['subscriber_id'] ?>" />
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $subscriber['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $subscriber['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo $subscriber['email'] ?>" id="email" name="email" readonly>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Address</label>
            <input type="text" class="form-control" value="<?php echo $subscriber['home_address'] ?>" id="home_address" name="home_address" >
        </div>
        <div class="mb-3">
        <label>Gender&nbsp;&nbsp;</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" <?php if($subscriber['gender']=="Male"){ echo "checked";}?>>
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" <?php if($subscriber['gender']=="Female"){ echo "checked";}?>>
            <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="mb-3"><br>
            <label for="formFile" class="form-label">Choose Image</label>
            <input class="form-control" type="file" name="proimg" id="proimg" disabled>
        </div>
        
        </div><br>
        <div><br>
        <a href="admin.php?" class="btn btn-outline-dark">Back to List</a>
         <button type="submit" name="submit" class="btn btn-block btn-success">Save Changes</button>
        </div>
    </form>
    <?php } ?>


</div>
<br><br>
<?php require_once 'includes/footer.php'; ?>