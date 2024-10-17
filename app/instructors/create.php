<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth(2);
///get all courses data///
$rounds="SELECT * FROM `courses` ";
$couresdata=mysqli_query($connect,$rounds);
///get all rounds data///
$rounds="SELECT * FROM `rounds` ";
$roundsdata=mysqli_query($connect,$rounds);

$Errors=[];
if(isset($_POST['submit']))
{
  
  $name=filtervalidation($_POST['name']);
  $email=filtervalidation($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
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
   
 //insert code////      
   if(empty($Errors))
   {
   $insert="INSERT INTO `users` VALUES (null,'$name','$email','$location',DEFAULT,'$hashpass','instructor',DEFAULT,DEFAULT,DEFAULT,DEFAULT)";
   $query=mysqli_query($connect,$insert);
   //////////////get user data
   $selectaftersubmit="SELECT * FROM `users` WHERE `email`='$email'";
   $enteredData=mysqli_query($connect,$select);
   $newRows=mysqli_fetch_assoc($enteredData);
   $newUserID=$newRows['id'];
   //////////////
   $phone=filtervalidation($_POST['phone']);
   $salary=filtervalidation($_POST['salary']);
   $course_title=$_POST['title'];
   $round_id=$_POST['round_number'];
   $select="SELECT * FROM `instructors` ";
   $data=mysqli_query($connect,$select);
   $numrows=mysqli_num_rows($data);
// Validation   
   if(stringvalidation($phone))
   {
     $Errors[]="You Must Enter Valid phone";
   }
   if(numbervalidation($salary))
   {
     $Errors[]="You Must Enter Valid salary";
   }
   
 //insert code

    $insert="INSERT INTO `instructors` VALUES (null,'$phone','$salary','$round_id','$newUserID','$course_title')";
    $query=mysqli_query($connect,$insert);
    redirect('/app/instructors/index.php'); 
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
  <h1>New Instructor</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('app/instructors/index.php')?>">instructors</li>
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
          <h5 class="card-title">Create Instructor</h5>

          <!-- Horizontal Form -->
          <form method="post" enctype="multipart/form-data">
        
          <div class="row mb-3">
              <label for="inputname" class="col-sm-2 col-form-label">Your Name</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Instructor Name" name="name" type="text" class="form-control" id="inputname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter Instructor Email" name="email" class="form-control" id="inputemail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" placeholder=" Enter Instructor Password" name="password"class="form-control" id="inputpassword">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputimage" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image" accept="/*image" class="form-control  btn btn-outline-primary" id="inputimage">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Instructor phone" name="phone" type="phone" class="form-control" id="inputphone">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputsalary" class="col-sm-2 col-form-label">salary</label>
              <div class="col-sm-10">
                <input type="number" placeholder=" Enter Instructor salary" name="salary" class="form-control" id="inputsalary">
              </div>
            </div>

            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">course</label>
              <div class="col-sm-10">
              <select  class="form-control" name="title" >
                        <?php foreach($couresdata as $items): ?>
                            <option value="<?= $items['id']?>"><?= $items['title']?></option>
                        <?php endforeach ;?>
                    </select>           
                </div>
            </div>


            <div class="row mb-3">
              <label for="created_by" class="col-sm-2 col-form-label">Round</label>
              <div class="col-sm-10">
              <select  class="form-control" name="round_number" >
                        <?php foreach($roundsdata as $items): ?>
                            <option value="<?= $items['id']?>"><?= $items['round_number']?></option>
                        <?php endforeach ;?>
                    </select>           
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