<?php

   require_once("connection.php");


   if(isset($_GET['Del']))
   {

    $UserID =$_GET['Del'];
    $query = "delete from users where id = '".$UserID."'";
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