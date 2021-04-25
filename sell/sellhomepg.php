<?php
require_once '../connection.php';
$conn = getDBConnection();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/homepg.css" rel="stylesheet">
    <link href="../css/sellpg.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Sell Home Page</title>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="homepg.php">
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
    <div class="form">
        <form action="/carRodioAssignment/sell/sellhomepg.php" method="post">
            <h2>Sell My Car</h2><br>
            <p>Ready to sell your car? carRodio.lk can help you get maximum value for your vehicle. With the
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
                $slideShowId = 1;
                while ($rows1 = $get1->fetch_assoc()) {
                    $vid= $rows1['id'];
            ?>
                    <table style="width: 100%">
                        <tr>
                            <td style="padding-left: 100px; width: 50%">
                                <div class="cards">
                                    <div class="card">
                                        <div style="width:300px" id="slideShow<?php echo $slideShowId?>" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                    // Get images from the database
                                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=$vid");
                                                    if($query->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $query->fetch_assoc()) { ?>
                                                            <div class="carousel-item <?php if ($i == 1){echo ' active';}  ?>"  >
                                                                <img class="d-block w-100 img-fluid" src="uploads/<?php echo $row["fileName"]?>" alt="">
                                                            </div>

                                                            <?php
                                                            $i++;
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#slideShow<?php echo $slideShowId?>" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#slideShow<?php echo $slideShowId?>" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: center">
                                    <a href="../buy/advpg.php?vid=<?php echo $rows1['id'];?>">
                                        <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b>
                                        </h4>
                                        <p><?php echo $rows1['modelYr']; ?></p>
                                    </a>
                                </div>


                            </td>

                            <td style="padding-right:100px;padding-left: 50px;padding-bottom: 80px; width: 50%">
                                <a href="updateAdv.php?vid=<?php echo $rows1['id']?>">
                                    <input type="button" value=" Update advertisement " />
                                </a>
                                <br><br>
                                <a href="deleteAdv.php?vid=<?php echo $rows1['id']?>">
                                    <input type="button" value=" Delete advertisement "/>
                                </a>
                            </td>
                        </tr>
                    </table>


            <?php  $slideShowId++;} ?>
            <br><br><br>

            <h4>View Contact History</h4><br>
            <a href="/carRodioAssignment/sell/contHistorypg.php">
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
