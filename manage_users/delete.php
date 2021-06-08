<?php
session_start();
require_once '../connection.php';
$con = getDBConnection();
   if(isset($_GET['Del']))
   {

    $UserEmail =$_GET['Del'];
    $query = "delete from user where email= '".$UserEmail."'";
    $result =  mysqli_query($con,$query);

    if($result)
    {
        header("location:view.php");
    }
    else
    {
        echo 'Please Check Your Querry';
    }

   }
   else
   {
       header("location:view.php");

   }
   

?>