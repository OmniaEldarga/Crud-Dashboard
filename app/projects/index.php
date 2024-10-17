<!DOCTYPE html>
<html lang="en">
<?php 
include_once '../../shared/head.php'; 
include_once '../../vendor/dbase.php';
include_once '../../vendor/functions.php';
auth(2);
///get project data///
$select = "SELECT * FROM `projects` ";
$allcourses=mysqli_query($connect,$select);
$count=1;

?>

<body>
<?php 
include_once '../../shared/header.php'; 
include_once '../../shared/aside.php'; 
?>
<main id="main" class="main" style="min-height: 720px; padding: 20px;">

    <div class="pagetitle">
      <h1>Our Projects</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('index.php')?>">Home</a></li>
          <li class="breadcrumb-item">Projects</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List projects </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($allcourses as $item):?>
                  <tr>
                    <td><?=$count++?></td>
                    <td><?=htmlspecialchars($item['title'])?></td>
                    <td><?=htmlspecialchars($item['description'])?></td>
                    <td> <a class="text-info" href="./view.php?view=<?=$item['id']?>">view</a></td>
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