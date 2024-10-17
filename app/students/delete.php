<?php 
include_once '../../vendor/dbase.php';
include_once '../../vendor/functions.php';
if(isset($_GET['delete']))
{
  $id = filter_var($_GET['delete'], FILTER_VALIDATE_INT);
  if($id)
  {
    $select = "SELECT image FROM `users` WHERE id = $id";
    $result = mysqli_query($connect, $select);
    $user = mysqli_fetch_assoc($result);
    if($user) 
    {
      if(!empty($user['image'])) 
      {
          $image_path = realpath('../users/upload/'.$user['image']);
          
          if(file_exists($image_path)) 
          {
              unlink($image_path); 
          }
      }

            $delete = "DELETE FROM `users` WHERE id = $id";
            $date = mysqli_query($connect, $delete);
            
            
            redirect('app/students/index.php');
        } 
        else 
        {
            echo "User not found.";
        }
    } 
    else 
    {
        echo "Invalid ID.";
    }
}
?>

