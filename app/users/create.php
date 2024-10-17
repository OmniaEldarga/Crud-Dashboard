<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
$Errors=[];
if(isset($_POST['submit']))
{
  
  $name=filtervalidation($_POST['name']);
  $email=filtervalidation($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
  $types=($_POST['types']);
  $created_at=($_POST['created_at']);

  // Check for existing email
   $select="SELECT * FROM `users` WHERE `email`='$email'";
   $data=mysqli_query($connect,$select);
   $numrows=mysqli_num_rows($data);

  
   // Validation

     if(stringvalidation($name))
     {
      $Errors[]="You Must Enter Valid Name";
     }
     if(emailvalidation($email))
     {
     $Errors[]="You Must Enter Valid Email";
     }
     if(roleValidation($types))
     {
      $Errors[]="Invalid Types: Please Select a valid Type.";
     }
     if(dateValidation($created_at))
     {
      $Errors[]="Please enter a valid date";
     }


if($numrows>0)
  {
     $Errors[]="This Email Is Already In Use, Please Enter Another Email";
  }
  else
  {
   $hashpass=password_hash($password,PASSWORD_DEFAULT);
   // Handle file upload
    $image_name=rand(0, 1000).$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $file_size=$_FILES['image']['size'];
   // Validate file type

   if(sizefilevalidation($file_size))
    { 
     $Errors[]="Your File Size Is Bigger Than 2 MIGA";
    }

   // Move uploaded file 
     $location="./upload/$image_name";
     $place_image=move_uploaded_file($tmp_name,$location);
  

 //insert code////    
  if(empty($Errors))
   {
   $insert="INSERT INTO `users` VALUES (null,'$name','$email','$location',DEFAULT,'$hashpass','$types',DEFAULT,'$created_at',DEFAULT,DEFAULT)";
   $query=mysqli_query($connect,$insert);
   
   redirect('/app/users/index.php');
   }
   
  }

}
?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php';
?>

<main id="main" class="main" style="min-height: 720px; padding: 20px;">

<div class="pagetitle">
  <h1>New Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('app/users/index.php')?>">Users</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container col-8">
  <div class="row">
    <div class="col-lg-12">
      <?php if(!empty($Errors)) :?>
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 <ul>
                  <?php  foreach($Errors as $error):?>
                    <li><?=$error?></li>
                  <?php  endforeach;?>
                 </ul>
          </div>
      <?php endif ; ?> 
       <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Users</h5>

          <!-- Horizontal Form -->
          <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputname" class="col-sm-2 col-form-label">Your Name</label>
              <div class="col-sm-10">
                <input placeholder=" Enter User Name" name="name" type="text" class="form-control" id="inputname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter User Email" name="email" class="form-control" id="inputEmail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" placeholder=" Enter User Password" name="password"class="form-control" id="inputPassword">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image" accept="/*image" class="form-control  btn btn-outline-primary" id="inputImage">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputtypes" class="col-sm-2 col-form-label">Types</label>
              <div class="col-sm-10">
                <select name="types" class="form-control" id="">
                  <option value="">Select Type</option>
                  <option value="admin">Admin</option>
                  <option value="instructor">Instructor</option>
                  <option value="student">Student</option>
                </select>
              </div>
            </div> 
            <div class="row mb-3">
              <label for="created_at" class="col-sm-2 col-form-label">Create At</label>
              <div class="col-sm-10">
                <input  type="date"  name="created_at"class="form-control" id="created_at">
              </div>
            </div>

            <div class="text-center">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
      
    </div>
  </div>
</section>

</main><!-- End #main -->

<?php include_once '../../shared/footer.php';
  include_once '../../shared/script.php';
  ?>

</body>

</html>

