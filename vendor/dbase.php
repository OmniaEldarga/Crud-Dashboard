<?php
$host="localhost";
$username="root";
$password="";
$dbname="instant";
$connect=mysqli_connect($host,$username,$password,$dbname);
try
{
 $connect=mysqli_connect($host,$username,$password,$dbname);
}
catch(Exception $e)
{
  echo $e->getMessage();
}
?> 