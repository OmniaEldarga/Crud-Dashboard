<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
///get all courses///
$courses="SELECT * FROM `courses` ";
$coursesdata=mysqli_query($connect,$courses);

///get all users///
$users="SELECT * FROM `users` ";
$usersdata=mysqli_query($connect,$users);

$Errors=[];
if(isset($_POST['submit']))
{
  $round_num=filtervalidation($_POST['round_number']);
  $description=filtervalidation($_POST['description']);
  $created_at=$_POST['created_at'];
  $course_title=filtervalidation($_POST['course_title']);
  $user_name=$_POST['created_by'];
  
  
// Validation  
if(stringvalidation($description))
{
  $Errors[]="You Must Enter Valid Description";
}  
if(numbervalidation($round_num))
{
  $Errors[]="You Must Enter Valid Round_Number";
} 

//insert code
  $insert="INSERT INTO `rounds` VALUES (null,'$round_num','$description','$course_title','$user_name','$created_at',DEFAULT)";
  $query=mysqli_query($connect,$insert);
  redirect('/app/rounds/index.php');
}
?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php';
?>

<main id="main" class="main" style="min-height: 720px; padding: 20px;">

<div class="pagetitle">
  <h1>New Round</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('/app/rounds/index.php')?>">Round</li>
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
          <h5 class="card-title">Create Round</h5>

          <!-- Horizontal Form -->
          <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="round_number" class="col-sm-2 col-form-label">Round Number</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Round Number" name="round_number" type="number" class="form-control" id="round_number">
              </div>
            </div>
            <div class="row mb-3">
              <label for="created_by" class="col-sm-2 col-form-label">Created By</label>
              <div class="col-sm-10">
              <select  class="form-control" name="created_by" >
                        <?php foreach($usersdata as $items): ?>
                            <option value="<?= $items['id']?>"><?= $items['name']?></option>
                        <?php endforeach ;?>
                    </select>           
                </div>
            </div>
            <div class="row mb-3">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter Round Description" name="description" class="form-control" id="description">
              </div>
            </div>
            <div class="row mb-3">
              <label for="course_title" class="col-sm-2 col-form-label">Course Title</label>
              <div class="col-sm-10">
              <select  class="form-control" name="course_title" >
                        <?php foreach($coursesdata as $items): ?>
                            <option value="<?= $items['id']?>"><?= $items['title']?></option>
                        <?php endforeach ;?>
                    </select>              </div>
            </div>
            
            <div class="row mb-3">
              <label for="created_at" class="col-sm-2 col-form-label">Created_at</label>
              <div class="col-sm-10">
                <input type="date" name="created_at" class="form-control" id="created_at">
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

