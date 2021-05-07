
<?php
require_once '../connection.php';
$conn = getDBConnection();
?>



<!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/adminpg.css" rel="stylesheet">

        <title>Home</title>
        <script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>

    </head>

    <body>

        <script src="../js/imgupload.js"></script>
        <!-- Header -->
        <header class="">
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

<div class="main">
        <h2>Most Engaged Buyer Report</h2> <br> <br> 
      
</div>
<div class="buyer_div">

<img class="profile" src="/carRodioAssignment/img/profile_logo.png" alt="">

<?php
                    $Email='remonkavi@gmail.com';

                    $query1 = "SELECT * FROM users WHERE id=7";
                    $get1 = $conn->query($query1);
                    while ($rows1 = $get1->fetch_assoc()) {?>
        <table class="tg">
<thead>
  <tr>
  <th class="tg-0lax"> Buyer Email</th>
    <th class="tg-0lax"> Buyer name</th>
    <th class="tg-0lax"> Buyer address</th>
    <th class="tg-0lax"> Contact Number</th>
    <td class="tg-0lax">  Number of sessions  </td>
    
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">  <?php echo $rows1["email"];?>    </td>
    <td class="tg-0lax">   <?php echo $rows1["uname"];?>   </td>
    <td class="tg-0lax">  <?php echo $rows1["address"];?>    </td>
    <td class="tg-0lax">  <?php echo $rows1["cno"];?>    </td>
    <td class="tg-0lax">  <?php echo 18;?>    </td>

  </tr>
</tbody>
</table>

<?php }?>
  

</div>
<a href="generatereport.php"  >  <input type="button" value="Back" class="button" name="back" /> </a>


    </body>

    </html>