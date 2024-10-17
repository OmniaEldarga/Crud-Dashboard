<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth(2,3);
///get all rounds///
$rounds="SELECT * FROM `rounds` ";
$roundsdata=mysqli_query($connect,$rounds);

$Errors=[];
if(isset($_POST['submit']))
{
  
  $name=filtervalidation($_POST['name']);
  $email=filtervalidation($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
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
   $location="../users/upload/$image_name";
   $place_image=move_uploaded_file($tmp_name,$location);
  ///insert code////    
   if(empty($Errors))
   {
   $insert="INSERT INTO `users` VALUES (null,'$name','$email','$location',DEFAULT,'$hashpass','student',DEFAULT,'$created_at',DEFAULT,DEFAULT)";
   $query=mysqli_query($connect,$insert);
   /////get user data 
   $selectaftersubmit="SELECT * FROM `users` WHERE `email`='$email'";
   $enteredData=mysqli_query($connect,$select);
   $newRows=mysqli_fetch_assoc($enteredData);
   $newUserID=$newRows['id'];
   /////// add student data as user
   $created_at=$_POST['created_at'];
   $collage=filtervalidation($_POST['collage']);
   $Department=filtervalidation($_POST['Department']);
   $round_id=($_POST['round_number']);
   $select="SELECT * FROM `students` ";
   $data=mysqli_query($connect,$select);
   $numrows=mysqli_num_rows($data);

// Validation

if(stringvalidation($collage))
{
  $Errors[]="You Must Enter Valid Collage";
}
if(emailvalidation($Department))
{
  $Errors[]="You Must Enter Valid Department";
} 
if(dateValidation($created_at))
{
  $Errors[]="Please enter a valid date";
}  
   
////insert code 
    $insert="INSERT INTO `students` VALUES (null,'$collage','$Department','$round_id','$newUserID','$created_at',DEFAULT)";
    $query=mysqli_query($connect,$insert);
    redirect('/app/students/index.php'); 
   }
   
  } 
}
?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php';
?>

<main id="main" class="main" style="min-height: 220px; padding: 20px;">

<div class="pagetitle">
  <h1>New Stundents</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('/app/students/index.php')?>">Stundents</li>
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
          <h5 class="card-title">Create Studenst</h5>

          <!-- Horizontal Form -->
          <form method="post" enctype="multipart/form-data">
        
          <div class="row mb-3">
              <label for="inputname" class="col-sm-2 col-form-label">Your Name</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Studenst Name" name="name" type="text" class="form-control" id="inputname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter Studenst Email" name="email" class="form-control" id="inputemail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" placeholder=" Enter Studenst Password" name="password"class="form-control" id="inputpassword">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputimage" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image" accept="/*image" class="form-control  btn btn-outline-primary" id="inputimage">
              </div>
            </div>

            <div class="row mb-3">
              <label for="collage" class="col-sm-2 col-form-label">Collage</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Studenst Collage" name="collage" type="text" class="form-control" id="collage">
              </div>
            </div>
            <div class="row mb-3">
              <label for="Department" class="col-sm-2 col-form-label">Department</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter Studenst Department" name="Department" class="form-control" id="Department">
              </div>
            </div>

            <div class="row mb-3">
              <label for="round_number" class="col-sm-2 col-form-label">Round</label>
              <div class="col-sm-10">
              <select  class="form-control" name="round_number" >
                        <?php foreach($roundsdata as $items): ?>
                            <option value="<?= $items['id']?>"><?= $items['round_number']?></option>
                        <?php endforeach ;?>
                    </select>           
                </div>
            </div>

            </div> 
            <div class="row mb-3">
              <label for="created_at" class="col-sm-2 col-form-label">Create At</label>
              <div class="col-sm-10">
                <input type="date" name="created_at"class="form-control" id="created_at">
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