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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/contactpg.css" rel="stylesheet">

    <title>Home</title>


</head>

<body>
    <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

    </div>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
                <thead>
                    <h2>Contact The Seller</h2>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label> </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="name">Name:</label>
                        </td>
                        <td>
                            <input type="text" name="nametxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="loc">Location:</label>
                        </td>
                        <td>
                            <input type="text" name="loctxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="mob">Mobile No:</label>
                        </td>
                        <td>
                            <input type="number" name="mobtxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="email">Email:</label>
                        </td>
                        <td>
                            <input type="text" name="emailtxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="msg">Message:</label>
                        </td>
                        <td>
                            <textarea type="text" name="msgtxt" row="20" col="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> </label>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <a href="advpg.php"><input type="button" value="Cancel" name="cancel" /></a>
                        </td>
                        <td>
                            <a><input type="submit" value="Send" name="submit" /></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>

</body>

</html>