<!DOCTYPE html>
<html lang="en">
<?php 
include_once './shared/head.php';
include_once './vendor/dbase.php';
include_once './vendor/functions.php';
$message=null;
if(isset($_POST['login']))
{
  $email=$_POST['Email'];
  $password=$_POST['password'];
  $select="SELECT * FROM `users` WHERE `email`='$email'";
  $date=mysqli_query($connect,$select);
  $userDate=mysqli_fetch_assoc($date);
  $numrows=mysqli_num_rows($date);
  if($numrows==1)
  {
    $hashpassword=$userDate['password'];
    $userpassword=password_verify($password,$hashpassword);
    if($userpassword)
    {
      setcookie('auth',$userDate['id'],time()+(86400*60),'/'); 
      $_SESSION['auth']=
      [
        "id"=>$userDate['id'],
        "name"=>$userDate['name'],
        "email"=>$userDate['email'],
        "image"=>$userDate['image'],
        "rule_id"=>$userDate['rule_id'],
  
      ];
      redirect("index.php");
    }
  }
  else
  {
    $message="Incorrect Password Please Try Again";
  }

}
if(isset($_GET['logout']))
{
  setcookie('auth_user',$userDate['id'],time()-(86400*30),'/');
  session_unset();
  session_destroy();
  redirect('/login.php');
}
?>
<body>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= base_url()?>" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">INATANT</span>
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
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your Email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post">

                    <div class="col-12">
                      <label for="Email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="Email" class="form-control" id="Email" required>
                        <div class="invalid-feedback">Please enter your Email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?= base_url('register.php')?>">Create an account</a></p>
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