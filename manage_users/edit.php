<?php

require_once("connection.php");
$UserID = $_GET['GetID']; 
$email = $_GET['GetEmail'];
$query = "select * from user where email='".$email."'";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
    
    $UserEmail = $row['email'];
    $UserName = $row['uname'];
    $UserAddress = $row['address'];
    $UserC = $row['cno'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark ">

      <div class="container">
        <div class="row">
         <div class="col-lg-6 m-auto">
          <div class="card mt-5">
           <div class="card-title">
            <h3 class="bg-success text-white text-center py-3"> Update Form in PHP </h3>
            </div>
            <div class="card-body">

            <form action="update.php?email=<?php echo $email ?>" method="post">
                
                <input type="text" class="form-control mb-2" placeholder="User Email" name="email" value="<?php echo $UserEmail ?>">
                <input type="text" class="form-control mb-2" placeholder="User Name" name="uname" value="<?php echo $UserName ?>">
                <input type="text" class="form-control mb-2" placeholder="User address" name="address" value="<?php echo $UserAddress ?>">
                <input type="text" class="form-control mb-2" placeholder="User contact" name="cno" value="<?php echo $UserC ?>">
                <button class="btn btn-primary" name="update">Update</button>
              
              </form>
             
            </div>
           </div>
         </div>
       </div>
    </div>
  </div>
    
 
        
    
</body>
</html>