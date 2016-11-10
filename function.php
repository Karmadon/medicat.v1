<?php
require_once('classes/userClass.php'); 
$userObj = new USER(); 
session_start();
$type = $_GET['type'];


if(empty($type) || !isset($type)) {

  echo 'Request type is not set';

} else if($type == 'signup') {

   $data =  USER::addNewUser($_REQUEST);
   $_SESSION = $data;
   if($data['status'] == 'error') {
     header("location:register.php");
   } else {
     header("location:index.php");
   }
} else if($type == 'login') {
   $username = addslashes($_REQUEST['username']);
   $password = addslashes($_REQUEST['password']);
   $_SESSION =  USER::login($username, $password);
   if($_SESSION['status'] == 'error') {
     header("location:index.php");
   } else {
     header("location:profile");
   }
   
} else if($type == 'logout') {
 unset($_SESSION);
 session_destroy();
 header("location:index.php");
}


?>

