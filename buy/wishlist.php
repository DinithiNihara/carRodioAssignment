<?php
 require_once '../connection.php';
 $conn = getDBConnection();
 session_start();
 $vId=$_REQUEST['vid'];
if(isset( $vId))
{
     if(empty($vId) ){
     
        echo 'please select again';
     }
     else
     {
       $query = "INSERT INTO wishlist (vid) values('$vId')";
       $result = mysqli_query($conn,$query);

       if($result)
       {
           
        echo "<script>alert('Added to wishlist.')</script>";
       }
       else
       {
           echo 'Try again!';
       }

     }
}
else
{
   /* header("location:advpg.php"); */
}

?>

<html>

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
    <title>Wish list</title>
</head>
<body>

<h3 class="h3_wishlist"> Wishlist </h3>
<?php
                $query1 = 'SELECT * FROM vehicle WHERE id IN(SELECT vid FROM wishlist)';
                $get1 = $conn->query($query1)or die($conn->error);
                $slideShowId = 1;
                while ($rows1 = $get1->fetch_assoc()) {
                    $vid= $rows1['id'];
            ?>
                    <table style="width: 500px">
                        <tr>
                            <td style="padding-left: 100px; width: 50%">
                                <div class="cards">
                                    <div class="card card1">
                                        <div style="width:300px" id="slideShow<?php echo $slideShowId?>" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                    // Get images from the database
                                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=$vid");
                                                    if($query->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $query->fetch_assoc()) { ?>
                                                            <div class="carousel-item <?php if ($i == 1){echo ' active';}  ?>"  >
                                                                <img class="d-block w-100 img-fluid" src="../sell/uploads/<?php echo $row["fileName"]?>" alt="">
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

                            
                        </tr>
                    </table>


            <?php  $slideShowId++;} ?>
            <script>
        document.getElementsByClassName("ss1")[0].classList.add("active");
    </script>

                                                </body>
</html>




