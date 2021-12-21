<?php 
    $title='User Login';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>
<div class="header50  text-center" style=" background-image: url('./uploads/login1.jpg');" >
  <div class=" jumbotext " >
    <h1 class="display-4 text-white p-2 hd" >About Us</h1>
  </div>
</div>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];

        $result = $user->getUser($username, $password);

        if(!$result){
            echo '<br><div class="alert alert-danger">Username or Password is incorrect. Please try again.</div>';
        }
        else{
            $_SESSION['userid'] = $result['id'];
            $_SESSION['username'] = $username;
            header("Location: index.php");
            
        }
    }

 ?>


 <div class="container">
    <br>
    <br>

    <div class="container col-md-4 offset-4 logg">
    <br>
    <h2 class="text-center"><?php echo $title ?></h2><br>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'];  ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
            <?php if(empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>"; ?>
        </div>
        <div class="text-center" >
            <input type="submit" value="Login" class="btn btn-primary" >
            <br><br>
        </div>
    </form>
    
    </div>
    <br><br>
<?php require_once 'includes/footer.php'; ?>