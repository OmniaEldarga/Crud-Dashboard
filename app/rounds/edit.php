<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
auth();

// Get all courses
$courses = "SELECT * FROM `courses`";
$coursesdata = mysqli_query($connect, $courses);

// Get all users
$users = "SELECT * FROM `users`";
$usersdata = mysqli_query($connect, $users);

if(isset($_GET['edit'])) 
{
    $id = $_GET['edit'];
    
    // Select round data
    $select = "SELECT * FROM `rounds` WHERE id=$id";
    $query = mysqli_query($connect, $select);
    $numrows = mysqli_num_rows($query);
    
    if($numrows == 1) 
    {
        $data = mysqli_fetch_assoc($query);
    } 
    else
     {
        header("location: /INSTANT/error404.php"); 
        exit;
    }

    // Update round information
    if (isset($_POST['changes']))
     {
        $round_numb = filtervalidation($_POST['round_number']);
        $description = filtervalidation($_POST['description']);
        $created_by = $_POST['created_by'];
        $course_title = $_POST['course_title'];

        // Update query
        $update = "UPDATE `rounds` SET `round_number`='$round_numb', description='$description', course_id='$course_title', user_id='$created_by' WHERE id=$id";
        
        if (mysqli_query($connect, $update))
         {
            header("location: ./index.php");
        } 
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
    <div class="container col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Edit Round information</label>
                    <div class="col-md-8 col-lg-9">
                        <a class="float-end btn btn-primary " href="./index.php">Back</a>
                    </div>
                </div>
                <!-- Profile Edit Form -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="round_number" class="col-md-4 col-lg-3 col-form-label">Round Number</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="round_number" type="number" class="form-control" id="round_number" value="<?= htmlspecialchars($data['round_number']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="created_by" class="col-md-4 col-lg-3 col-form-label">Created By</label>
                        <div class="col-md-8 col-lg-9">
                            <select class="form-control" name="created_by">
                                <?php foreach($usersdata as $items): ?>
                                    <option value="<?= $items['id'] ?>" <?= ($items['id'] == $data['user_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($items['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="description" type="text" class="form-control" id="description" value="<?= htmlspecialchars($data['description']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="course_title" class="col-md-4 col-lg-3 col-form-label">Course Title</label>
                        <div class="col-md-8 col-lg-9">
                            <select class="form-control" name="course_title">
                                <?php foreach($coursesdata as $items): ?>
                                    <option value="<?= $items['id'] ?>" <?= ($items['id'] == $data['course_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($items['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button name="changes" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form><!-- End Profile Edit Form -->

            </div><!-- End Bordered Tabs -->
        </div>
    </div>
</main>

<?php 
include_once '../../shared/footer.php';
include_once '../../shared/script.php';
?>

</body>
</html>
