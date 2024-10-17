<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth(2,3);

if(isset($_GET['edit']))
{
  $id=$_GET['edit'];
  // Select user data
  $select= "SELECT * FROM `users` WHERE id='$id' AND types='student'";
  $query=mysqli_query($connect,$select);
  $userdata=mysqli_fetch_assoc($query);

  // Select student data
  $select= "SELECT * FROM `students` WHERE user_id='$id'";
  $query=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($query);
  
//update code
  if (isset($_POST['changes'])) 
  {
    
    $name=filtervalidation($_POST['name']);
    $image=$_FILES['image']['name'];
    $collage=filtervalidation($_POST['collage']);
    $Department=filtervalidation($_POST['Department']);
    $updated_at=$_POST['updated_at'];
// Handle image upload
    if (empty($_FILES['image']['name']))
    {
      $location = $userdata['image']; 
    } 
    else
    {
// Validate and process the uploaded image       
      $oldImage = $userdata['image'];
      if (file_exists($oldImage)) 
      {
        unlink($oldImage); 
      }

      $image_name = rand(0, 1000) . $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $location = '../users/upload/'. $image_name;
      move_uploaded_file($tmp_name,$location);
    }

    //Update user information
    $update = "UPDATE `users` SET `name`='$name',  `image`='$location' WHERE id='$id' AND types='student' ";
    $userquery = mysqli_query($connect, $update);

    //// Update student information
    $update = "UPDATE `students` SET `collage`='$collage', `Department`='$Department', `updated_at`='$updated_at' WHERE user_id='$id' ";
    $studentquery = mysqli_query($connect, $update);
    header("location: ./index.php");
  }
}
else
{
  header("location: /INSTANT/error404.php"); 
}
?>

<body>
<?php 
include_once "../../shared/header.php";
include_once '../../shared/aside.php'; 
?>

<main id="main" class="main" style="min-height: 720px; padding: 20px;">

    <div class=" container col-xl-12">
      <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Edit Course Information</label>
                      <div class="col-md-8 col-lg-9">
                      <a class="float-end btn btn-primary " href="./index.php">Back</a>
                      </div>
                    </div>
                  <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data">
                
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                     <input name="name" type="text" class="form-control" id="name" value="<?= htmlspecialchars($userdata['name'])?>">
                   </div>
                  </div>

                  <div class="row mb-3">
                   <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                   <div class="col-md-8 col-lg-9">
                    <img width="250px" src="<?= htmlspecialchars($userdata['image'])?>" alt="Profile">
                   <div class="pt-2">
                     <input type="file" name="image" class="w-80 form-control btn btn-primary">
                  </div>
                 </div>
                </div>


               <div class="row mb-3">
                 <label for="collage" class="col-md-4 col-lg-3 col-form-label">Collage</label>
                 <div class="col-md-8 col-lg-9">
                   <input name="collage" type="text" class="form-control" id="collage" value="<?= htmlspecialchars($data['collage'])?>">
                 </div>
                </div>

               <div class="row mb-3">
                 <label for="Department" class="col-md-4 col-lg-3 col-form-label">Department</label>
                 <div class="col-md-8 col-lg-9">
                   <input name="Department" type="text" class="form-control" id="Department" value="<?= htmlspecialchars($data['Department'])?>">
                  </div>
                </div>

              <div class="row mb-3">
               <label for="updated_at" class="col-md-4 col-lg-3 col-form-label">updated_at</label>
               <div class="col-md-8 col-lg-9">
                  <input name="updated_at" type="date" class="form-control" id="updated_at" value="<?= $data['updated_at']?>">
                </div>
              </div>

                <div class="text-center">
                  <button name="changes" type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>


</main>



<?php include_once '../../shared/footer.php';
   include_once '../../shared/script.php';
?>

</body>

</html>