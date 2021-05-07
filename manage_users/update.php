<?php

require_once("connection.php");

if(isset($_POST['update']))
{
    $UserID = $_GET['ID'];
    $UserEmail = $_POST['email'];
    $UserName = $_POST['uname'];
    $UserAddress = $_POST['address'];
    $UserC = $_POST['cno'];

    $query = "update users set email = '".$UserEmail."'
    ,uname='".$UserName. "',address='".$UserAddress."' 
    ,cno='".$UserC."' where id='".$UserID."'";
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