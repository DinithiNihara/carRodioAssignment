 <?php
  
  require_once("connection.php");
  $query = "select * from user";
  $result = mysqli_query($con,$query);
 ?>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        
        <link rel="stylesheet" a href="CSS/bootstrap.css"/>
        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/sellpg.css" rel="stylesheet">

        <title>Manage user</title>
        <script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>

    </head>

        <script src="../js/imgupload.js"></script>
        <!-- Header -->
 
<body class="bg-dark ">

<header >
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo -->
                    <a class="navbar-brand" href="../homepg.php">
                        <div class="logo">
                            <img class="logo" src="/carRodioAssignment/img/logow.png" alt="">
                        </div>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="../homepg.php">Home</a></li>

                            <li class="nav-item"><a class="nav-link" href="../buy/buypg.php">Buy</a></li>

                            <li class="nav-item active"><a class="nav-link" href="sellhomepg.php">Sell</a></li>

                            <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>






      <div class="container container1">
        <div class="row">
         <div class="col m-auto">
          <div class="card mt-5">
            <table class = "table table-bordered"> 
               <tr>
                
                 <td>Email </td>
                 <td>Username </td>
                 <td>Address </td>
                 <td>Contact Number </td>
                 <td> Edit </td>
                
                 <td> Delete </td>

               </tr>

               <?php

                    while($row=mysqli_fetch_assoc($result))
                    {   
                        $UserEmail = $row['email'];
                        $UserName = $row['uname'];
                        $UserAddress = $row['address'];
                        $UserC = $row['cno'];

                    

               ?>

                     <tr>
                        
                        <td><?php echo $UserEmail ?></td> 
                        <td><?php echo $UserName ?></td>
                        <td><?php echo $UserAddress ?></td>
                        <td><?php echo $UserC ?></td>

                        
                        <td><a href="edit.php?GetEmail=<?php echo $UserEmail ?>">Edit</a></td>
                        <td><a href="delete.php?Del=<?php echo $UserEmail ?>">Delete</a></td>
                    <tr> 

                    

                <?php

                    }
                
                ?>
     


            </table>
          
        
         </div>
       </div>
    </div>
  </div>

  <a href="../admin/adminhomepg.php"  >  <input type="button" value="Back" class="button1" name="back" /> </a>

</body>
</html>