<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth(2);
if(isset($_GET['view']))
{
  $user_id=$_GET['view'];
  $select="SELECT * FROM `round_course_user` WHERE round_id=$user_id";
  $query= mysqli_query($connect,$select);
  $numrows=mysqli_num_rows($query);
  if($numrows==1)
  {
   $data=mysqli_fetch_assoc($query);
  }
  else
  {
    header("location: /INSTANT/error404.php"); 
  }
}
else
  {
    header("location: /INSTANT/error404.php"); 
  }

?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php'; 
?>
<main id="main" class="main" style="min-height: 720px; padding: 20px; ">
<section class="section profile">
  <div class="row">

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Round Details</button>
              <a class="float-right" href="./index.php">Back</a></h5>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
           
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Round Number</div>
                <div class="col-lg-9 col-md-8"><?= $data['round_number']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Round Description</div>
                <div class="col-lg-9 col-md-8"><?= $data['description']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Course ID</div>
                <div class="col-lg-9 col-md-8"><?= $data['course_id']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Course Title</div>
                <div class="col-lg-9 col-md-8"><?= $data['course_title']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Course Description</div>
                <div class="col-lg-9 col-md-8"><?= $data['course_description']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">User ID</div>
                <div class="col-lg-9 col-md-8"><?= $data['user_id']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">User Name</div>
                <div class="col-lg-9 col-md-8"><?= $data['user_name']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">User Email</div>
                <div class="col-lg-9 col-md-8"> <?= $data['user_email']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">User Type</div>
                <div class="col-lg-9 col-md-8"> <?= $data['user_type']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">User_Rule_ID</div>
                <div class="col-lg-9 col-md-8"> <?= $data['user_rule_id']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Created_At</div>
                <div class="col-lg-9 col-md-8"> <?= $data['created_at']?></div>
              </div>

  
            </div>

        
          </div><!-- End Bordered Tabs -->

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