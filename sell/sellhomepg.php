<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbname = "carrodio1";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["deladv"])){
    
    $sql ="DELETE FROM vehicle WHERE id=1";

    if($conn->query($sql)===TRUE){
        echo "Advetisement was deleted successfully";
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }

}

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

    <link href="../css/sellpg.css" rel="stylesheet">

    <title>Sell Home Page</title>


</head>

<body>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/sellpg.css" rel="stylesheet">

        <title>Home</title>


    </head>

    <body>

        <!-- Header -->
        <header>
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
                            <li class="nav-item"><a class="nav-link" href="../homepg.php">Home</a></li>

                            <li class="nav-item"><a class="nav-link" href="../buy/buyhomepg.php">Buy</a></li>

                            <li class="nav-item active"><a class="nav-link" href="sellhomepg.php">Sell</a></li>

                            <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <div class="form">
            <form action="/carRodio/sell/sellhomepg.php" method="post">

                <h2>Sell My Car</h2><br>
                <p>Ready to sell your car? carRodio.lk can help you get maximum value for your vehicle. With three
                    options to choose from, selling a car has never been easier.</p>
                <br>
                <p>At carRodio.lk, you can sell your vehicle quickly by finding your best offer from a network of
                    verified car buyers and dealers through our trusted partnership with Motorway, or part exchange your
                    car with established dealers in your area. You can even advertise the sale of your vehicle for no
                    cost at all using our free private listings.</p>
                <br><br>

                <a href="addAdv.php">
                    <input type="button" value=" Add advertisement " name="addadv" />
                </a>
                <br><br><br>

                <h4>Edit/ Delete Advertisements</h4><br>
                <?php
                $query1 = 'SELECT * FROM vehicle ';
                $get1 = $conn->query($query1)or die($conn->error);
                while ($rows1 = $get1->fetch_assoc()) {?>
                    <?php $vid= $rows1['id']?>
                    <table>
                        <tr>
                            <td style="padding-left:150px">
                                <div class="cards">
                                    <div class="card">

                                        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel"
                                            style="width:250px">
                                            <div class="carousel-inner">
                                                <?php
                                                // Get images from the database
                                                $query = $conn->query("SELECT * FROM carimages WHERE vehicleId='$vid'");

                                                if($query->num_rows > 0){
                                                    while($row = $query->fetch_assoc()){
                                                    $imageURL = 'uploads/'.$row["fileName"];
                                                    ?>

                                                    <div class="carousel-item ss1">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>"
                                                        alt="" class="image img-fluid" />
                                                </div>
                                                <?php }
                                            
                                                }else{ ?>
                                                    <p>No image(s) found...</p>
                                                    <?php } ?>

                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls1" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                        <?php
                                        $query1 = "SELECT * FROM vehicle WHERE id='$vid'";
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                            <a href="../buy/advpg.php?vid=<?php echo $rows1['id'];?>">
                                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b>
                                                </h4>
                                                <p><?php echo $rows1['modelYr']; ?></p>
                                            </a>
                                        <?php }?>
                            </td>
                            <td style="padding-left:50px">
                                <a href="updateAdv.php">
                                    <input type="button" value=" Update advertisement " name="upadv" />
                                </a>
                                <br><br>
                                <a href="sellhomepg.php">
                                    <input type="submit" value=" Delete advertisement " name="deladv" />
                                </a>
                            </td>
                        </tr>
                    </table>
                <?php } ?>
                <br><br><br>

                <h4>View Contact History</h4><br>
                <a href="/carRodio/sell/contHistorypg.php">
                    <input type="button" value=" Contact History " name="contact" />
                </a>
                <br><br>
            </form>
        </div>

        <script>
            document.getElementsByClassName("ss1")[0].classList.add("active");
        </script>

    </body>

    </html>