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

        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/sellpg.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Highest Reached Advertisement Report</title>
       

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
            <h2>Highest Reached Advertisement Report</h2> <br> <br> 
    
            <?php
                        $query1 = "SELECT * FROM vehicle WHERE views IN( SELECT MAX(views) AS views FROM vehicle)";
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>

            <table class="tg">
                <thead>
                <tr>
                    <th class="tg-0lax"> Advertisement ID</th>
                    <th class="tg-0lax"> Seller </th>
                    <th class="tg-0lax"> Vehicle brand</th>
                    <th class="tg-0lax"> Vehicle Model </th>
                    <th class="tg-0lax"> Number of clicks</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tg-0lax"> <?php echo $rows1["id"];?>  </td>

                    <td class="tg-0lax">   <?php echo $rows1["sname"];?>  </td>

                    <td class="tg-0lax">  <?php echo $rows1["manufacturer"];?>   </td>

                    <td class="tg-0lax">  <?php echo $rows1["model"];?>   </td>

                    <td class="tg-0lax">   <?php echo $rows1["views"];?>  </td>
                </tr>
                </tbody>

            </table>
    
            <?php } ?>

        </div>
        <div class="highest_add">

            <div class="form">
                <form action="/carRodioAssignment/buy/contactpg.php" method="post" id="form">
                    
                
                        <!-- Slideshow -->
                            <?php
                            $query1 = "SELECT * FROM vehicle WHERE views IN( SELECT MAX(views) AS views FROM vehicle)";
                            $get1 = $conn->query($query1);
                            $option1 = '';
                            $vId=$rows1["id"];
                            $rows1 = $get1->fetch_assoc() ?>
                        
                            <h2 class="title_add" id="title"><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h2>
                            <h4 class="title_add" name="modelYr"><?php echo $rows1['modelYr']; ?></h4>
                            

                            <input type="hidden" name="manufacturer" id="con_content" 
                            value="<?php echo $rows1['manufacturer']; ?>
                            <?php echo $rows1['model'];?>
                            <?php echo $rows1['modelYr']; ?>" />

                            
                            <div >
                                <table class="seller">
                                    <tr>
                                        <td></td>
                                        <td>
                                            <label class="title_seller"><b>Seller Details:</b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td><label>Name: </label>
                                            <label type="text" name="sname" id="sname"><?php echo $rows1['sname']; ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td><label>Contact No: </label>
                                            <label type="text" name="scno" id="scno"><?php echo $rows1['scno']; ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td><label>Email: </label>
                                            <label type="text" name="semail" id="semail" ><?php echo $rows1['semail']; ?></label>

                                            <input type="hidden" name="sellerEmail" value="<?php echo $rows1['semail']; ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td><label>Location: </label>
                                            <label type="text" name="sloc" id="sloc"><?php echo $rows1['sloc']; ?></label>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td><label> </label></td>

                                        <td>
                                            <a href="carRodioAssignment/buy/contactpg.php"><input type="submit" value="Contact the seller"
                                                    name="contact" /></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    
                                    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" style="width:250px">
                                        <div class="carousel-inner">
                                            <?php
                                                // Get images from the database
                                                $query = $conn->query("SELECT * FROM carimages WHERE vehicleId IN(
                                                    SELECT id FROM vehicle WHERE views IN( SELECT MAX(views) AS views FROM vehicle)
                                                ) ORDER BY vehicleId DESC");

                                                if($query->num_rows > 0){
                                                    while($row = $query->fetch_assoc()){
                                                        $imageURL = '../sell/uploads/'.$row["fileName"];
                                                        ?>

                                                            <div class="carousel-item ss1">
                                                                <img src="<?php echo $imageURL; ?>" alt="" class="image img-fluid mainslide" />
                                                            </div>
                                            <?php }
                                                    
                                                }else{ ?>
                                                    <p>No image(s) found...</p>
                                                    <?php } ?>

                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <br>
                            
                                    
                                <!-- All Images  -->   
                                        <?php
                                        // Get images from the database
                                        $query = $conn->query("SELECT * FROM carimages WHERE vehicleId IN(
                                            SELECT id FROM vehicle WHERE views IN( SELECT MAX(views) AS views FROM vehicle)
                                        ) ORDER BY vehicleId DESC");

                                            if($query->num_rows > 0){
                                                while($row = $query->fetch_assoc()){
                                                    $imageURL = '../sell/uploads/'.$row["fileName"];
                                        ?>
                                        <img src="<?php echo $imageURL; ?>" alt="" class="thumbnail1" />
                                                <?php }
                                            }else{ ?>
                                                <p>No image(s) found...</p>
                                                <?php } ?>

                    <table >       
                            <tbody>
                                <tr>
                                    <td><label><b>Condition, Body type & More</b></label></td>
                                </tr>
                                <tr>
                                    <td><label>Condition: </label></td>
                                    <td>

                                        <p><?php echo $rows1['vCondition']; ?></p>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><label>Color: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['color']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Body Type: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['bodyType']; ?>
                                        </p>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><label>Fuel Type: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['fuelType']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Year of Registration: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['regYr']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                </tr>
                                <tr>
                                    <td><label><b>Other</label></b></td>
                                </tr>
                                <tr>
                                    <td><label>Engine Capacity: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['engCapacity']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Transmission: </label></td>
                                    <td>
                                        <p>
                                            <?php echo $rows1['transmission']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Mileage: </label></td>
                                    <td>
                                        <p name="mil_content" id="mil_content">
                                            <?php echo $rows1['mileage']; ?> </p>
                                    </td>
                                </tr>


                                <tr>
                                    <td><label></label></td>
                                </tr>
                                <tr>
                                    <td><label>Price: </label></td>
                                    <td>
                                        <p name="price" id="price" ><?php echo $rows1['price']; ?> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                <tr>
                                    <td><label>Additional Details: </label></td>
                                    <td>
                                                <p  name="adDetails" id="adDetails">
                                                <?php echo $rows1['addDetails']; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                
                            </tbody>
                    </table>
                </form>
            </div>

            <script>
                document.getElementsByClassName("ss1")[0].classList.add("active");
            </script>

        </div>
        <a href="generatereport.php"  >  <input type="button" value="Back" class="button" name="back" /> </a>
    </body>

</html>
