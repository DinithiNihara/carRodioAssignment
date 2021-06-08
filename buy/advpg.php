<?php
session_start();
$server = "localhost";
$user = "root";
$password = "1234";
$dbname = "carrodio1";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
    $rating= $_POST['rating']; // Get Rating from form
    $name = $_POST['name']; // Get Name from form
    $email = $_SESSION['email']; // Get Email from form
    $comment = $_POST['comment']; // Get Comment from form

    $sql = "INSERT INTO comments (name, email, comment, rating)
			VALUES ('$name', '$email', '$comment',$rating)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "UPDATE user SET comments=comments+1 WHERE email='$email'";
        mysqli_query($conn, $sql);

        echo "<script>alert('Comment added successfully.')</script>";
    } else {
        echo "<script>alert('Comment does not add.')</script>";
    }
}
$vId = $_REQUEST['vid'];

$sql = "UPDATE vehicle SET views=views+1 WHERE id=$vId";
mysqli_query($conn, $sql);

$email = $_SESSION['email'];

$sql = "UPDATE user SET pviews=pviews+1 WHERE email='$email'";
mysqli_query($conn, $sql);

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
    <link rel="stylesheet" type="text/css" href="../css/comment.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://kit.fontawesome.com/bb52f0e357.js" crossorigin="anonymous"></script>

    <title>Selected Advertisement</title>

</head>
<body style="padding: 20px">


    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="../homepg.php">
                    <div class="logo">
                        <img class="logo" src="/carRodioAssignment/img/logow.png" >
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="../homepg.php">Home</a></li>

                        <li class="nav-item active"><a class="nav-link" href="buypg.php">Buy</a></li>

                        <li class="nav-item"><a class="nav-link" href="../sell/sellhomepg.php">Sell</a></li>

                        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="form">
        <form action="/carRodioAssignment/buy/contactpg.php" method="post" id="form">

        <a id="goBack" href="../homepg.php" > <b>&#8592;</b> All Advertisements</a>
                <!-- Slideshow -->
                    <?php
$vId = $_REQUEST['vid'];

$query1 = "SELECT * FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                    <img id="wish_icon" src="/carRodioAssignment/img/wish.png"/>
                    <h2 class="title_add" id="title"><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h2>
                    <h4 class="title_add" name="modelYr"><?php echo $rows1['modelYr']; ?></h4>


                    <input type="hidden" name="manufacturer" id="con_content"
                    value="<?php echo $rows1['manufacturer']; ?>
                    <?php echo $rows1['model']; ?>
                    <?php echo $rows1['modelYr']; ?>" />

                    <?php }?>
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
                                    <?php
$query1 = "SELECT sname FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                    <label type="text" name="sname" id="sname"><?php echo $rows1['sname']; ?></label>

                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Contact No: </label>
                                    <?php
$query1 = "SELECT scno FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                    <label type="text" name="scno" id="scno"><?php echo $rows1['scno']; ?></label>

                                    <?php }?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Email: </label>
                                    <?php
$query1 = "SELECT semail FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                    <label type="text" name="semail" id="semail" ><?php echo $rows1['semail']; ?></label>

                                    <input type="hidden" name="sellerEmail" value="<?php echo $rows1['semail']; ?>"/>

                                    <?php }?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Location: </label>
                                    <?php
$query1 = "SELECT sloc FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                    <label type="text" name="sloc" id="sloc"><?php echo $rows1['sloc']; ?></label>

                                    <?php }?>

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
$query = $conn->query("SELECT * FROM carimages WHERE vehicleId=$vId");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $imageURL = '../sell/uploads/' . $row["fileName"];
        ?>

                                                    <div class="carousel-item ss1">
                                                        <img src="<?php echo $imageURL; ?>" alt="" class="image img-fluid mainslide" />
                                                    </div>
                                    <?php }

} else {?>
                                            <p>No image(s) found...</p>
                                            <?php }?>

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
$query = $conn->query("SELECT * FROM carimages WHERE vehicleId=$vId ORDER BY vehicleId DESC");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $imageURL = '../sell/uploads/' . $row["fileName"];
        ?>
                                <img src="<?php echo $imageURL; ?>" alt="" class="thumbnail1" />
                                        <?php }
} else {?>
                                        <p>No image(s) found...</p>
                                        <?php }?>



            <table >
                    <tbody>
                        <tr>
                            <td><label><b>Condition, Body type & More</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Condition: </label></td>
                            <td>
                                <?php
$query1 = "SELECT vCondition FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>

                                <p><?php echo $rows1['vCondition']; ?></p>

                                <?php }?>

                            </td>

                        </tr>
                        <tr>
                            <td><label>Color: </label></td>
                            <td>
                                <?php
$query1 = "SELECT color FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['color']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Body Type: </label></td>
                            <td>
                                <?php
$query1 = "SELECT bodyType FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['bodyType']; ?>
                                </p>

                                <?php }?>

                            </td>

                        </tr>
                        <tr>
                            <td><label>Fuel Type: </label></td>
                            <td>
                                <?php
$query1 = "SELECT fuelType FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['fuelType']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Year of Registration: </label></td>
                            <td>
                                <?php
$query1 = "SELECT regYr FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['regYr']; ?>
                                </p>

                                <?php }?>
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
                                <?php
$query1 = "SELECT engCapacity FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['engCapacity']; ?>
                                </p>

                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Transmission: </label></td>
                            <td>
                                <?php
$query1 = "SELECT transmission FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);

while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['transmission']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Mileage: </label></td>
                            <td>
                                <?php
$query1 = "SELECT mileage FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                <p name="mil_content" id="mil_content">
                                    <?php echo $rows1['mileage']; ?> </p>

                                <?php }?>

                            </td>
                        </tr>


                        <tr>
                            <td><label></label></td>
                        </tr>
                        <tr>
                            <td><label>Price: </label></td>
                            <td>
                                <?php
$query1 = "SELECT price FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                <p name="price" id="price" ><?php echo $rows1['price']; ?> </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label>Additional Details: </label></td>
                            <td>
                                <?php
$query1 = "SELECT addDetails FROM vehicle WHERE id=$vId";
$get1 = $conn->query($query1);
$option1 = '';
while ($rows1 = $get1->fetch_assoc()) {?>
                                        <p  name="adDetails" id="adDetails">
                                        <?php echo $rows1['addDetails']; ?></p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>

                    </tbody>
            </table>
        </form>
    </div>
    
    
    <div class="wrapper">
                <form action="" method="POST" class="form">

                    <div class="row">
                        <div class="col-sm-12">
                            <div id="rating_wrapper">
                                <div class="rating">
                                    <span class="rating__result"></span>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                

                    <input type="hidden" name="rating" id="stars"/>
                    <div class="row">
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your Name" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value=<?php echo $_SESSION['email'] ?> required>
                        </div>
                    </div>
                    <div class="input-group textarea">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Post Comment</button>
                    </div>
                </form>
                <div class="prev-comments">
                    <?php

$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                    <div class="single-item">
                        <h4><?php echo $row['name']; ?></h4>
                        <div>
                            <?php
                                $rating = $row['rating'];

                                $r = 0;
                                for($i = 1; $i <= 5; $i++ ){
                                    echo '<span class="fa fa-star ';
                                    if($r<$rating){
                                        echo 'checked';
                                    }
                                    echo '"></span>';
                                    $r++;
                                }
                            ?>
                            <!-- <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> -->
                        </div>
                        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                        <p><?php echo $row['comment']; ?></p>
                    </div>
                    <?php

    }
}

?>
                </div>
	        </div>

    <script>
        document.getElementsByClassName("ss1")[0].classList.add("active");

        const ratingStars = [...document.getElementsByClassName("rating__star")];
        const ratingResult = document.querySelector(".rating__result");

        printRatingResult(ratingResult);

        function executeRating(stars, result) {
        const starClassActive = "rating__star fas fa-star";
        const starClassUnactive = "rating__star far fa-star";
        const starsLength = stars.length;
        let i;
        stars.map((star) => {
            star.onclick = () => {
                i = stars.indexOf(star);

                if (star.className.indexOf(starClassUnactive) !== -1) {
                    printRatingResult(result, i + 1);
                    for (i; i >= 0; --i) stars[i].className = starClassActive;
                } else {
                    printRatingResult(result, i);
                    for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
                }
            };
        });
        }

        function printRatingResult(result, num = 0) {
        document.getElementById('stars').value = num;
        result.textContent = `${num}/5`;
        }

        executeRating(ratingStars, ratingResult);

    </script>

</body>

</html>
