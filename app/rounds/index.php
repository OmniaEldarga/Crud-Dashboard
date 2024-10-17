<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
include_once '../../vendor/functions.php';
auth();
///get course data///
$select = "SELECT * FROM `courses` ";
$allcourse=mysqli_query($connect,$select);
$count=1;

///get user data///
$select = "SELECT * FROM `users` ";
$allround=mysqli_query($connect,$select);
$count=1;

///get round data///
$select = "SELECT * FROM `rounds` ";
$allround=mysqli_query($connect,$select);
$count=1;

?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php'; 
?>
<main id="main" class="main" style="min-height: 720px; padding: 20px;">

    <div class="pagetitle">
      <h1>Rounds Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
          <li class="breadcrumb-item">Rounds</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Rounds <a class="float-end" href="./create.php">Create New Round</a></h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Round_Number</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                 </tr>
                </thead>
                <tbody>
                  <?php foreach($allround as $item):?>
                  <tr>
                    <td><?=$count++?></td>
                    <td><?=$item['round_number']?></td>
                    <td><?=$item['description']?></td>
                    <td> <a class="text-info" href="./view.php?view=<?=$item['id']?>">view</a></td>
                    <td> <a class="text-primary" href="./edit.php?edit=<?=$item['id']?>">Edit</a></td>
                    <td> <a class="text-danger" href="./delete.php?delete=<?=$item['id']?>">Delete</a></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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