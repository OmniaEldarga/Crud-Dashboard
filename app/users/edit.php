<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();
////get user data///
$select = "SELECT * FROM users";
$allusers = mysqli_query($connect, $select);

///edit code
if (isset($_GET['edit'])) 
{ 
  $id = $_GET['edit'];
  
  // Select the user to edit
  $select = "SELECT * FROM users WHERE id='$id'";
  $query = mysqli_query($connect, $select);
  $numrows = mysqli_num_rows($query); 

  if ($numrows == 1)
   {
    $data = mysqli_fetch_assoc($query);
  } 
  else
  {
    header("location: /INSTANT/error404.php"); 
  }
  
    //update code
  if (isset($_POST['changes'])) {
    $name = filtervalidation($_POST['name']);
    $email = filtervalidation($_POST['email']);
    $types = $_POST['types'];

    // Input validation
    if (empty($name) || empty($email) || empty($types)) 
    {
        $Errors[] = "All fields are required.";
    }
    
    if (empty($_FILES['image']['name']))
    {
      $location = $data['image']; // Use existing image
    } 
    else
    {
      // Validate and process the uploaded image
        $oldimage=$data['image'];
        unlink($oldImage); // Remove old image
        $image_name = rand(0, 1000) . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = './upload/'.$image_name;
        move_uploaded_file($tmp_name,$location);
    }

    // Update user information
    if (empty($Errors)) 
    {
        $update = "UPDATE users SET name='$name', email='$email', image='$location', types='$types' WHERE id='$id'";
        $u = mysqli_query($connect, $update);

        if ($u) 
        {
          redirect("/app/users/index.php");
          exit();
        }
        else 
        {
          $Errors[] = "Failed to update user: " . mysqli_error($connect);
        }
    }
  }}
 else
  {
  header("location: /INSTANT/error404.php");
  exit();
}
?>
<body>
<?php 
include_once '../../shared/aside.php'; 
include_once "../../shared/header.php";
?>

<main id="main" class="main" style="min-height: 720px; padding: 20px;">
    <div class="container col-xl-8">
      <div class="card">
        <div class="card-body">
          <div class="row mb-3"> 
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Edit info</label>
            <div class="col-md-8 col-lg-9">
              <a class="float-end btn btn-primary" href="./index.php">Back</a>
            </div>
          </div>

          <!-- Display error messages -->
          <?php if (!empty($Errors)): ?>
            <div class="alert alert-danger">
              <?php foreach ($Errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
              <div class="col-md-8 col-lg-9">
                <img width="250px" src="<?= htmlspecialchars($data['image']) ?>" alt="Profile">
                <div class="pt-2">
                  <input type="file" name="image" class="w-50 form-control btn btn-primary">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
              <div class="col-md-8 col-lg-9">
                <input name="name" type="text" class="form-control" id="fullName" value="<?= htmlspecialchars($data['name']) ?>" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
              <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" id="Email" value="<?= htmlspecialchars($data['email']) ?>" required>
              </div>
            </div>

            <div class="row mb-3">
             <label for="type" class="col-md-4 col-lg-3 col-form-label">Type</label>
               <div class="col-md-8 col-lg-9">
                  <select class="form-control" name="types" id="type" required>
                    <option value="">Select Type</option> <!-- Default option -->
                    <option value="admin" <?= isset($data['types']) && $data['types'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="instructor" <?= isset($data['types']) && $data['types'] == 'instructor' ? 'selected' : '' ?>>Instructor</option>
                    <option value="student" <?= isset($data['types']) && $data['types'] == 'student' ? 'selected' : '' ?>>Student</option>
                   </select>
                </div>
            </div>


            <div class="text-center">
              <button name="changes" type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>

<?php include_once '../../shared/footer.php'; include_once '../../shared/script.php'; ?>
</body>
</html>
