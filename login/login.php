<?php
session_start();
require_once '../connection.php';
$conn = getDBConnection();

if(isset($_SERVER['REQUEST_METHOD'])=="POST"
&& isset($_POST['eml']) && isset($_POST['pwd']))
{
    $uemail=$_POST['eml'];
    $upwd=$_POST['pwd'];

    $sql="SELECT * from user where email='$uemail' AND 
    password='$upwd' limit 1";
      
    $result=$conn->query($sql);

    if($result && mysqli_num_rows($result)>0)
    {
        $row=$result->fetch_assoc();
        
        if($row['email'] == $uemail
        && $row['password'] == $upwd)
        {
            $sql="UPDATE user SET logins=logins+1 WHERE email='$uemail'";
            $conn->query($sql);
            $_SESSION['email']=$uemail;
            $_SESSION['uname']=$row['uname'];
            echo "(<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You have successfully logged in.')
            window.location.href='/carRodioAssignment/homepg.php';
            </SCRIPT>)";
        die;
        }
    
    }else{
        echo'<script>alert("Your username or password is incorrect")</script>';
    }
  
} ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/styles.css" rel="stylesheet">

    <title>Sign In</title>

</head>

<body>

   <div class="logo">

        <img class="logo" src="/carRodioAssignment/img/logow.png" alt="">

   </div>

   <!--<div class="main">

        <img src="img/bg.png" alt="">

   </div-->

   <div class="bg-img">

    <form action="/carRodioAssignment/login/login.php" method="post" class="container">

        <input type="text" placeholder="Email Address" name="eml" required>
  
        <input type="password" placeholder="Password" name="pwd" required>

        <p class="fp"><a href="../register/verifyemail.php">Forgot Password?</a></p>


        <div class="flex-container">
            <div>
                <label class="checkbox">
                    
                    <input type="checkbox"> Remember me?
                    <span class="checkmark"></span>
                            
                </label>
            </div>

            <div>
            <a href="../sell/sellhomepg.php"><input type="submit" class="btn" value="Sign In" name="email"/></a>
            </div>
            
        </div>

        <p class="link">
            Doesn't have an account? <b><a href="../register/register.php">Sign Up</a></b>
        </p>
    
    </div>
        

    </form>

  </div>
    
</body>

</html>