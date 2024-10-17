<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
include_once '../../vendor/functions.php';
auth();
if(isset($_POST['submit']))
{
  $coursename=$_POST['name'];
  $coursedescr=$_POST['description'];
  $created_at=$_POST['created_at'];
  $select="SELECT * FROM `courses` ";
  $data=mysqli_query($connect,$select);
   $insert="INSERT INTO `courses` VALUES (null,'$coursename','$coursedescr',DEFAULT,DEFAULT)";
   $query=mysqli_query($connect,$insert);
   redirect('/app/courses/index.php');
  
}
?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php';
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>New Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
      <li class="breadcrumb-item">Courses</li>
      <li class="breadcrumb-item active">Create New Course</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container col-8">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Course</h5>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Back</li>
          </ol>
          <!-- Horizontal Form -->
          <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Course Name</label>
              <div class="col-sm-10">
                <input placeholder=" Enter Course Name" name="name" type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Course Description</label>
              <div class="col-sm-10">
                <input type="text" placeholder=" Enter Course Description" name="description" class="form-control" id="inputEmail">
              </div>
              <div class="row mb-3">
              <label for="created_at" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="DATE"  name="created_at" class="form-control" id="created_at">
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
