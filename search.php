
<?php

$con = new PDO("mysql:host=localhost;dbname=phpsearch",'root','');

if(isset($_POST["submit"])){
    $sh = $_POST["search"];
    $sql = $con->prepare("SELECT * FROM `cars` WHERE Brand = '$sh'");

    $sql -> setFetchMode(PDO:: FETCH_OBJ);
    $sql -> execute();


    if($row = $sql->fetch()) {
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
                  <td><?php echo $row -> Brand; ?></td>
                  <td><?php echo $row -> Model; ?></td>
                  <td><?php echo $row -> Location; ?></td>
                  <td><?php echo $row -> Condition; ?></td>
        </table>

<?php
    }

        else{
            echo "Name Does not exist";
        }
}



?>

