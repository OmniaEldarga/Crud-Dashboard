<!DOCTYPE html>
<html lang="en">
<?php 
include_once './shared/head.php';
include_once './vendor/dbase.php';
include_once './vendor/functions.php';
// Register code.
$message=null;
if(isset($_POST['register']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $select="SELECT * FROM `users` WHERE `email`='$email'";
  $data=mysqli_query($connect,$select);
  $numrows=mysqli_num_rows($data);
  if($numrows>0)
  {
     $message="This Email Is Already In Use, Please Enter Another Email";
  }
  else
  {
   $hashpass=password_hash($password,PASSWORD_DEFAULT);
   $image_name=rand(0, 1000).$_FILES['image']['name'];
   $tmp_name=$_FILES['image']['tmp_name'];
   $location="./app/users/upload/$image_name";
   $place_image=move_uploaded_file($tmp_name,$location);
   $insert="INSERT INTO `users` VALUES (null,'$name','$email','$location',DEFAULT,'$hashpass',DEFAULT,DEFAULT,DEFAULT,DEFAULT)";
   $query=mysqli_query($connect,$insert);
   redirect('login.php');
  }

}
auth();
?>
<body>

<main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
       <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= base_url()?>" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">INSTANT</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <?php if($message !=null) :?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                      <?= $message?>   
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>  
                 <?php endif ; ?>
                <div class="card-body">
               
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <label for="image" class="form-label" >Your Image</label>
                        <input class="form-control btn btn-outline-primary" id="image" name="image" type="file" accept="/*image" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <button name="register" class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?= base_url('/login.php')?>">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
 <?php 
 include_once './shared/script.php';
 ?>
</body>

</html>