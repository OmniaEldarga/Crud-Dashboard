<?php 
include_once '../../vendor/dbase.php';
include_once '../../vendor/functions.php';
if(isset($_GET['delete']))
{
  $id=$_GET['delete'];
  $delete="DELETE  FROM `users` WHERE id=$id";
  $date=mysqli_query($connect,$delete);
  redirect('app/users/index.php');

}
?>