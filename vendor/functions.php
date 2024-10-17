<?php 
define('MAIN','http://localhost/INSTANT/');
function base_url($var=null)
{
  return MAIN.$var;
}

function redirect($var=null)
{
  header("location:http://localhost/INSTANT/$var");
}

function auth($rule2=null,$rule3=null)
{
  if($_SESSION['auth'])
  {
    if($_SESSION['auth']['rule_id']==1 ||$_SESSION['auth']['rule_id']==$rule2 ||$_SESSION['auth']['rule_id']==$rule3)
   {}
   else
   {
    redirect("error403.php");
   } 
  }
  else
  {
    header("location:login.php");
  }
}

//// filter Validation 
function filtervalidation($input)
{
  $input=ltrim($input);
  $input=rtrim($input);
  $input=strip_tags($input);
  $input=stripslashes($input);
  $input=htmlspecialchars($input);
  return $input;
}


////string validation
function stringvalidation($input,$maxlens=50,$minlens=3)
{
  $isEmpty=empty($input);
  $ISbiggerlens=strlen($input) > $maxlens;
  $ISsmallerlens=strlen($input) < $minlens;
  if($isEmpty || $ISbiggerlens || $ISsmallerlens)
  {
    return true;
  }
  else
  {
    return false;
  }
}


////Email validation
function emailvalidation($input,$maxlens=100,$minlens=9)
{
  $isEmpty=empty($input);
  $ISbiggerlens=strlen($input) > $maxlens;
  $ISsmallerlens=strlen($input) < $minlens;
  $IsNotEmail=!filter_var($input,FILTER_VALIDATE_EMAIL);
  if($isEmpty || $ISbiggerlens || $ISsmallerlens || $IsNotEmail)
  {
    return true;
  }
  else
  {
    return false;
  }
}

////Number validation
function numbervalidation($input)
{
  $isEmpty=empty($input);
  $IsNegative=$input < 0;
  $IsNotINT=!filter_var($input,FILTER_VALIDATE_INT);
  if($isEmpty ||  $IsNegative || $IsNotINT)
  {
    return true;
  }
  else
  {
    return false;
  }
}


////Size File validation
function sizefilevalidation($file_size,$you_size=2)
{
  $migsize=($file_size/1024)/1024;
  $isBigger=$migsize > $you_size;
  if($isBigger)
  {
    return true;
  }
  else
  {
    return false;
  }
}

//////type validation///
function roleValidation($input)
 {

  $allowedRoles = ['student', 'instructor', 'admin'];
  $isEmpty = empty($input);
  $isValidRole = in_array($input, $allowedRoles);
  if ($isEmpty || !$isValidRole) 
  {
    return true;
  }
  else
  {
    return false;
  }
}

/////create date validation/
function dateValidation($input)
 {
  
  if (empty($input))
  {
      return false; // Invalid: empty
  }
  $dateTime = DateTime::createFromFormat('mm-dd-yyyy', $input);
  
  if ($dateTime && $dateTime->format('mm-dd-yyyy') === $input) {
      return true; // Valid
  } else {
      return false; // Invalid
  }
}

?>