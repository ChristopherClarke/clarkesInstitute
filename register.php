<?php 
    $title='Registration';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    ?>
<div class="header50 jumbotron-fluid text-center" style=" background-image: url('./uploads/about1.jpg');" >
  <div class="container jumbotext " >
    <h1 class="display-4 text-white p-2 hd" >Register</h1>
  </div>
</div>

<?php

    $emailErr = "";



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $home_address = $_POST['home_address'];
        $gender = $_POST['gender'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
            $emailErr = "<span class='text-danger'>Invalid email format</span>";
          } else {
            
        //profile image
        $orig_file = $_FILES["proimg"]["tmp_name"];
        $ext = pathinfo($_FILES["proimg"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$email.$ext";
        move_uploaded_file($orig_file, $destination);

        $isSuccess = $crud->insertSubscribers($fname,$lname, $email, $home_address, $gender, $destination);

        if(!$isSuccess){ ?>        
            <br>
            <div class="alert alert-danger">An account with email <?php echo $_POST['email'] ?> already exists. Please try again.</div>
            <?php   }
         else{
            $_SESSION['firstname'] = $fname;
            $_SESSION['lastname'] = $lname;
            $_SESSION['email'] = $email;
            $_SESSION['home_address'] = $home_address;
            $_SESSION['gender'] = $gender;
            $_SESSION['imagepath'] = $destination;
            header("Location: success.php");
         }

      }    

        
    }

 ?>
 

<div class="container">
<br>
<div class=" col-md-8 offset-md-2">
    <h1 class="text-center">Subscription Form</h1>
    
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['firstname'];  ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['lastname'];  ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
            <span class="error"> <?php echo $emailErr;?></span>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="home_address" name="home_address" required
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['home_address'];  ?>">
        </div>
        <div class="mb-3">
        <label>Gender&nbsp;&nbsp;</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" checked>
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
            <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="mb-3"><br>
            <label for="proimg" class="form-label">Upload Image (Optional)</label>
            <input class="form-control" type="file" accept="image/*" name="proimg" id="proimg">
        </div>
        
        </div><br>
        <div>
         <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
        </div>
    </form>
</div>
<br><br>
<div class="clearfix"></div>

<?php require_once 'includes/footer.php'; ?>