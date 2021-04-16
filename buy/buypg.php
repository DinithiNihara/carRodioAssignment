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

if(isset($_POST["submit"])){
    $sh = $_POST["search"];
    $sql = $conn->prepare("SELECT * FROM vehicle WHERE manufacturer='$sh'");
    if($sql->num_rows > 0){
        while($row = $query->fetch_assoc()){
        ?>
        <br><br><br>
        <table>
               <tr>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Location</th>
                  <th>Condition</th>
               </tr>

               <tr>
                  <td><?php echo $row['manufacturer']; ?></td>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['vcondition']; ?></td>
                  <td><?php echo $row[' color']; ?></td>
        </table>

<?php
        }
    }

        else{
            echo "(<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Name Does not exist')
            window.location.href='/carRodio/buy/buypg.php'</SCRIPT>)";
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

    <style>
    table, th, td {
        border: 1px solid black;
    }
    </style>

    <title>Search bar </title>


</head>

<body>


    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="../homepg.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="../homepg.php">Home
                                <span class="sr-only"></span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="cars.html">Buy</a></li>

                        <li class="nav-item active"><a class="nav-link" href="sellhomepg.php">Sell</a></li>

                        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="form">
        <form action="/carRodio/buy/buypg.php" method="post">
            <label>Search</label>
            <input type="text" name="search">
            <br><br>
            <input type="submit" name="submit">
        </form>
    </div>



</body>

</html>