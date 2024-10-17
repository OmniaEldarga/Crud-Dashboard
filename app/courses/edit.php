<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
// get courses data
$select= "SELECT * FROM `courses`";
$query=mysqli_query($connect,$select);

if(isset($_GET['edit']))
{
  $id=$_GET['edit'];
// Select course data
  $select= "SELECT * FROM `courses` WHERE id=$id";
  $query=mysqli_query($connect,$select);
  $numrows=mysqli_num_rows($query);
  if($numrows==1)
  {
    $data=mysqli_fetch_assoc($query);
  }
  else
  {
    header("location: /INSTANT/error404.php"); 

  }
// Update course information
  if (isset($_POST['changes'])) 
{
  $title=$_POST['title'];
  $desciption=$_POST['desciption'];
  $updated_at=$_POST['updated_at'];
  $update = "UPDATE `courses` SET `title`='$title', desciption='$desciption', updated_at='$updated_at' WHERE id=$id";
  $u = mysqli_query($connect, $update);
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
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Edit course info</label>
                      <div class="col-md-8 col-lg-9">
                      <a class="float-end btn btn-primary " href="./index.php">Back</a>
                      </div>
                    </div>
                  <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" id="title" value="<?= htmlspecialchars($data['title'])?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="desciption" class="col-md-4 col-lg-3 col-form-label">Desciption</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="desciption" type="desciption" class="form-control" id="desciption" value="<?= htmlspecialchars($data['desciption'])?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="updated_at" class="col-md-4 col-lg-3 col-form-label">UPDATE_DATE</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="updated_at" type="date" class="form-control" id="updated_at" value="<?= htmlspecialchars($data['updated_at'])?>">
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