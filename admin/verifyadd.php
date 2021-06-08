<?php
session_start();
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
        <link href="../css/sellpg.css" rel="stylesheet">

        <title>Verify Advertisements</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

        <h2 class="heading_verify">Verify Advertisements</h2> <br>
            <div class="add_container">
                <?php
                    $query1 = 'SELECT * FROM vehicle WHERE id NOT IN(SELECT vid FROM vehiclestatus)';
                    $get1 = $conn->query($query1)or die($conn->error);
                    $slideShowId = 1;
                    while ($rows1 = $get1->fetch_assoc()) {
                        $vid= $rows1['id'];
                ?>
        
            <div class="cardsAd">
                <div class="cardAd">
                    <table>
                        <tr>
                            <td>
                                <div style="width:300px" id="slideShow1" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                            // Get images from the database
                                            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=$vid");
                                            if ($query->num_rows > 0) {
                                                $i = 1;
                                                while ($row = $query->fetch_assoc()) {?>
                                            <div class="carousel-item <?php if ($i == 1) {echo ' active';}?>">
                                                <img class="d-block w-100 img-fluid"
                                                    src="../sell/uploads/<?php echo $row["fileName"] ?>" alt="">
                                            </div>

                                            <?php
                                                $i++;
                                                    }
                                                }
                                            ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#slideShow<?php echo $slideShowId ?>"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#slideShow<?php echo $slideShowId ?>"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>

                                </div>
                            </td>
                            <td>
                                <a href="approveAdv.php?vid=<?php echo $rows1['id']?>">
                                    <input type="button" class="button2" value="Approve" name="Approve" /> 
                                </a>
                                <a href="rejectAdv.php?vid=<?php echo $rows1['id']?>">
                                    <input type="button" class="button2" value="Reject" name="Reject" /> 
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../buy/advpg.php?vid=<?php echo $rows1['id'];?>">
                                    <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b>
                                    </h4>
                                    <p><?php echo $rows1['modelYr']; ?></p>
                                </a>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php  $slideShowId++;} ?>   
        </div>    

        <script>
            document.getElementsByClassName("ss1")[0].classList.add("active");
        </script>
        <a href="../admin/adminhomepg.php"  >  <input type="button" value="Back" class="button1" name="back" /> </a>         
    </body>

</html>