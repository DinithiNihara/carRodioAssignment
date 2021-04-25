<?php
    session_start();
    require_once '../connection.php';
    $conn = getDBConnection();
    if(!isset($_POST)){
        header('Location: http://localhost/carRodioAssignment/sell/sellhomepg.php');
    }
    $vehicleId = $_POST["vid"];
    $sql1 = "SELECT * FROM carrodio1.vehicle where id='".$vehicleId."';";
    $oldCarDetails  = getResults($sql1)->fetch_assoc();

    if(isset($_POST["next"])) {
        //store posted values in the session variables
        $_SESSION['vehicle_id'] = $_POST["vid"];
        $_SESSION['manu_content'] = $_POST['manu_content'];
        $_SESSION['mod_content'] = $_POST['mod_content'];
        $_SESSION['modYr_content'] = $_POST['modYr_content'];
        $_SESSION['con_content'] = $_POST['con_content'];
        $_SESSION['col_content'] = $_POST['col_content'];
        $_SESSION['bod_content'] = $_POST['bod_content'];
        $_SESSION['fuel_content'] = $_POST['fuel_content'];
        $_SESSION['regYr_content'] = $_POST['regYr_content'];
        $_SESSION['eng_content'] = $_POST['eng_content'];
        $_SESSION['trans_content'] = $_POST['trans_content'];
        $_SESSION['mil_content'] = $_POST['mil_content'];
    }
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
        <script src="../js/imgupload.js"></script>
        <title>Update Advertisement - Aditional Information</title>
        <style>
            table, tr, td, th,{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
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
        <!-- Form -->

        <div class="form">
            <form action="/carRodioAssignment/sell/update.php" method="post" enctype="multipart/form-data">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h2 class="title"><b>Update Advertisement of <?php echo $oldCarDetails["manufacturer"]; echo ' ('.$oldCarDetails["model"].' )'; ?></b></h2>
                            </th>
                        </tr>
                    <thead>
                        <tbody>
                            <tr>
                                <td><label> </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="title">Vehicle Details</h4>
                                </td>
                                <td>
                                    <h4 class="title" id="active">Additional Information</h4>
                                </td>
                            </tr>
                            <tr>
                                <td><label> </label></td>
                            </tr>
                            <tr>
                                <td><label><b>Photos of vehicle</b></label></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 50%">
                                    <?php
                                        // Get images from the database
                                        $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=".$vehicleId);
                                        if($query->num_rows > 0){
                                            while($row = $query->fetch_assoc()){
                                                $imageURL = 'uploads/'.$row["fileName"];
                                    ?>
                                                <img src="<?php echo $imageURL; ?>" alt="" class="thumbnail" />
                                            <?php }
                                        }else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } ?><br>

                                        <label for='files'>Upload another photo(s): </label>

                                        <input id='files' type='file' name="files[]" multiple />
                                        <output id="result"></output>
                                </td>
                            </tr>
                            <tr style="padding-top: 30px">
                                <td></td>
                                <td>
                                    <label class="title"><b>Seller Details:</b></label>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Name: </label>
                                    <input type="text" name="sname" id="sname" value="<?php echo $oldCarDetails['sname']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Contact No: </label>
                                    <input type="text" name="scno" id="scno" value="<?php echo $oldCarDetails['scno']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Email: </label>
                                    <input type="text" name="semail" id="semail" value="<?php echo $oldCarDetails['semail']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td><label>Location: </label>
                                    <input type="text" name="sloc" id="sloc" value="<?php echo $oldCarDetails['sloc']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label></label></td>
                            </tr>
                            <tr>
                                <td><label>Price: </label></td>
                                <td>
                                    <input type="number" name="price" id="price" value="<?php echo $oldCarDetails['price']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label> </label></td>
                            </tr>
                            <tr>
                                <td><label>Additional Details: </label></td>
                                <td>
                                    <textarea rows="5" name="adDetails" id="adDetails">
                                            <?php echo $oldCarDetails['addDetails']; ?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><label> </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" onclick="window.history.back()">
                                        <input type="button" value=" Back " />
                                    </a>
                                </td>
                                <td>
                                    <input type="submit" value="Update" name="submit" />
                                </td>
                            </tr>

                        </tbody>
                </table>
            </form>
        </div>

    </body>
</html>
