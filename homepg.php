<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbname = "carrodio";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/homepg.css" rel="stylesheet">

    <title>Home</title>


</head>

<body onLoad="showSlides();">

    <script src="js/imgslideshow.js"></script>

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="homepg.php">
                    <div class="logo">
                        <img class="logo" src="/carRodio/img/logow.png" alt="">
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="homepg.php">Home
                                <span class="sr-only"></span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="cars.html">Buy</a></li>

                        <li class="nav-item"><a class="nav-link" href="sell/sellhomepg.php">Sell</a></li>

                        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <ul class="slideshow">
        <li><span>1</span></li>
        <li><span>2</span></li>
        <li><span>3</span></li>
        <li><span>4</span></li>
        <li><span>5</span></li>
    </ul>


    <div class="section">
        <h2>Featured Cars</h2>

        <table>
            <tr>
                <td>
                    <div class="cards">
                        <div class="card">
                            <?php
            // Get images from the database
            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=44");

            if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
                  $imageURL = 'sell/uploads/'.$row["fileName"];
                  ?>
                            <img src="<?php echo $imageURL; ?>" alt="" class="image" />
                            <?php }
            }else{ ?>
                            <p>No image(s) found...</p>
                            <?php } ?>


                            <?php
                $query1 = 'SELECT * FROM vehicle WHERE vId=44';
                $get1 = $conn->query($query1);
                $option1 = '';
                while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>

                </td>
                <td>
                    <?php
            // Get images from the database
            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=45");

            if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
                  $imageURL = 'sell/uploads/'.$row["fileName"];
                  ?>
                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <div class="numbertext">1 / 1</div>
                            <img src="<?php echo $imageURL; ?>" alt="" class="image" />
                        </div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                    </div>

                    <?php }
            }else{ ?>
                    <p>No image(s) found...</p>
                    <?php } ?>

                    <div class="container">
                        <?php
                $query1 = 'SELECT * FROM vehicle WHERE vId=45';
                $get1 = $conn->query($query1);
                $option1 = '';
                while ($rows1 = $get1->fetch_assoc()) {?>
                        <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                        <p><?php echo $rows1['modelYr']; ?></p>
                        <?php }?>
                    </div>
    </div>
    </div>
    </td>
    <td>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
            // Get images from the database
            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=45");

            if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
                  $imageURL = 'sell/uploads/'.$row["fileName"];
                  ?>

                <div class="carousel-item active">
                    <img src="<?php echo $imageURL; ?>" alt="" class="image" />
                </div>


                <?php }
                
            }else{ ?>
                <p>No image(s) found...</p>
                <?php } ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </td>

    </tr>
    </table>

</body>

</html>