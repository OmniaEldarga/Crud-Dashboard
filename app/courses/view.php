<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
$select="SELECT * FROM `course_infor` ";
$query= mysqli_query($connect,$select);
$coursedata=null;
if(isset($_GET['view']))
{
  $user_id=$_GET['view'];
  $select="SELECT * FROM `course_infor` WHERE course_id=$user_id";
  $query= mysqli_query($connect,$select);
  $coursedata=mysqli_fetch_assoc($query);
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">All Instructor Data</button>
              <a class="float-right" href="./index.php">Back</a></h5>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Course_ID</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['course_id']?></div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-4 label ">User_id</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['id']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Instructor</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['name']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['email']?></div>
              </div>



              <div class="row">
                <div class="col-lg-3 col-md-4 label">Image</div>
                <div class="col-lg-9 col-md-8"><img width="250px" src="<?= $coursedata['image']?>"></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Title</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['title']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Desciption	</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['desciption']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Round_Number</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['round_number']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Round_Description</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['round_description']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Created_At</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['created_at']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Updated_At</div>
                <div class="col-lg-9 col-md-8"><?= $coursedata['updated_at']?></div>
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