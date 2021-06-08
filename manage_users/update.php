<?php

require_once("connection.php");

if(isset($_POST['update']))
{
    
    $UserEmail = $_POST['email'];
    $UserName = $_POST['uname'];
    $UserAddress = $_POST['address'];
    $UserC = $_POST['cno'];

    $query = "update user set email = '".$UserEmail."'
    ,uname='".$UserName. "',address='".$UserAddress."' 
    ,cno='".$UserC."' where email='".$UserEmail."'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        header("location:view.php");
    }
    else{
        echo 'Please Check Your Querry ';
    }
}
else
{

    header("location:view.php");

}


?>