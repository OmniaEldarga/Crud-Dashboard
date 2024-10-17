<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth(2);

if (isset($_GET['edit'])) 
{
    $id = $_GET['edit'];

    // Select user data
    $select = "SELECT * FROM `users` WHERE id='$id' AND types='instructor'";
    $query = mysqli_query($connect, $select);
    $userdata = mysqli_fetch_assoc($query);

    // Select instructor data
    $select = "SELECT * FROM `instructors` WHERE user_id='$id'";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);

    if (isset($_POST['changes'])) 
    {
        $name = filtervalidation($_POST['name']);
        $phone = filtervalidation($_POST['phone']);
        $salary = numbervalidation($_POST['salary']);
        $image = $_FILES['image']['name'];

// Handle image upload
        if (empty($image)) 
        {
            $location = $userdata['image']; // Use existing image
        } 
        else 
        {
            $oldImage = $userdata['image'];
            if (file_exists($oldImage))
            {
                unlink($oldImage); // Remove old image
            }
            $image_name = rand(0, 1000) . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = '../users/upload/'.$image_name;
            move_uploaded_file($tmp_name, $location);
        }

        // Update user information
        $update_user = "UPDATE `users` SET `name`='$name', `image`='$location' WHERE id='$id' AND types='instructor'";
        mysqli_query($connect, $update_user);

        // Update instructor information
        $update_instructor = "UPDATE `instructors` SET `phone`='$phone', `salary`='$salary' WHERE user_id='$id'";
        mysqli_query($connect, $update_instructor);

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
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="<?=  htmlspecialchars($userdata['name'])?>">
                      </div>
                    </div>
                  
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                     <div class="col-md-8 col-lg-9">
                       <img width="250px" src="<?=  htmlspecialchars($userdata['image']) ?>" alt="Profile">
                      <div class="pt-2">
                        <input type="file" name="image" class="w-80 form-control btn btn-primary">
                      </div>
                     </div>
                    </div>


                    <div class="row mb-3">
                      <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="phone" value="<?= htmlspecialchars($data['phone'])?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="salary" class="col-md-4 col-lg-3 col-form-label">salary</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="salary" type="text" class="form-control" id="salary" value="<?=  htmlspecialchars($data['salary'])?>">
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