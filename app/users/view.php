<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
if(isset($_GET['view']))
{
  $user_id=$_GET['view'];
  $select="SELECT * FROM `user_data_rules` WHERE id=$user_id";
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">All User Data</button>
              <a class="float-right" href="./index.php">Back</a></h5>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
             

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?= $data['name']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?= $data['email']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Image</div>
                <div class="col-lg-9 col-md-8"><img width="250px" src=" /INSTANT/app/users/<?=$data['image']?>"></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Type</div>
                <div class="col-lg-9 col-md-8"><?= $data['types']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Rule Number</div>
                <div class="col-lg-9 col-md-8"><?= $data['rule_id']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Rule Name</div>
                <div class="col-lg-9 col-md-8"><?= $data['rule_name']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Description</div>
                <div class="col-lg-9 col-md-8"><?= $data['description']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">created_at</div>
                <div class="col-lg-9 col-md-8"><?= $data['created_at']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">updated_at</div>
                <div class="col-lg-9 col-md-8"> <?= $data['updated_at']?></div>
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