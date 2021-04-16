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

    <link href="../css/sellpg.css" rel="stylesheet">

    <title>Update Advertisement - Form 1</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>

</head>

    <body >


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
                            <li class="nav-item"><a class="nav-link" href="../homepg.php">Home</a></li>

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
            <form action="/carRodio/sell/updateAdv2.php" method="post">
                <table class="table">
                    <thead>
                        <h2 class="title"><b>Update Advertisement</b></h2>
                    <thead>
                    <tbody>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="title" id="active">Vehicle Details</h4>
                            </td>
                            <td>
                                <h4 class="title">Additional Information</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label><b>Manufacturer & Model</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Manufacturer</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select id="selected1" 
                                    onchange="document.getElementById('manu_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT manufacturer FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['manufacturer']; ?>" selected>
                                        <?php echo $rows1['manufacturer']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT manuName FROM carmanufacturer 
                                        WHERE manuName NOT IN(SELECT manufacturer FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                        <option value="<?php echo $rows['manuName']; ?>">
                                            <?php echo $rows['manuName']; ?>
                                        </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="manu_content" id="manu_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Model</label></td>
                            <td><label>Model Year</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select id="selected2" 
                                    onchange="document.getElementById('mod_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT model FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['model']; ?>" selected>
                                        <?php echo $rows1['model']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT modName FROM carmodel WHERE modName NOT IN(SELECT model FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['modName']; ?>"><?php echo $rows['modName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="mod_content" id="mod_content" value="" />
                            </td>
                            <td>
                                <select id="selected3" 
                                    onchange="document.getElementById('modYr_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT modelYr FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['modelYr']; ?>" selected>
                                        <?php echo $rows1['modelYr']; ?>
                                    </option>
                                    
                                    <?php }?>
                                    
                                    <?php
                                        $get = getResults('SELECT modYr FROM modelyear WHERE modYr NOT IN(SELECT modelYr FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['modYr']; ?>"><?php echo $rows['modYr']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="modYr_content" id="modYr_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        </tr>
                        <tr>
                            <td><label><b>Condition, Body type & More</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Condition</label></td>
                            <td><label>Color</label></td>
                        </tr>
                        <tr>
                            <td><select id="selected4" 
                                    onchange="document.getElementById('con_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT vCondition FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['vCondition']; ?>" selected>
                                        <?php echo $rows1['vCondition']; ?>
                                    </option>
                                    
                                    <?php }?>
                                    <?php
                                        $get = getResults('SELECT conName FROM carcondition WHERE conName NOT IN(SELECT vCondition FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['conName']; ?>"><?php echo $rows['conName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="con_content" id="con_content" value="" />
                            </td>
                            <td><select id="selected5" 
                                    onchange="document.getElementById('col_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT color FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['color']; ?>" selected>
                                        <?php echo $rows1['color']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT colName FROM carcolor WHERE colName NOT IN(SELECT color FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['colName']; ?>"><?php echo $rows['colName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="col_content" id="col_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Body Type</label></td>
                            <td><label>Fuel Type</label></td>
                        </tr>
                        <tr>
                            <td><select id="selected6" 
                                    onchange="document.getElementById('bod_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT bodyType FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['bodyType']; ?>" selected>
                                        <?php echo $rows1['bodyType']; ?>
                                    </option>
                                    
                                    <?php }?>
                                    
                                    <?php
                                        $get = getResults('SELECT bodType FROM carbodytype WHERE bodType NOT IN(SELECT bodyType FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['bodType']; ?>"><?php echo $rows['bodType']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="bod_content" id="bod_content" value="" />
                            </td>
                            <td><select id="selected7" 
                                    onchange="document.getElementById('fuel_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT fuelType FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['fuelType']; ?>" selected>
                                        <?php echo $rows1['fuelType']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT fuelType FROM carfueltype WHERE fuelType NOT IN(SELECT fuelType FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['fuelType']; ?>">
                                        <?php echo $rows['fuelType']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="fuel_content" id="fuel_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Year of Registration</label></td>
                        </tr>
                        <tr>
                            <td><select id="selected8" 
                                    onchange="document.getElementById('regYr_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT regYr FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['regYr']; ?>" selected>
                                        <?php echo $rows1['regYr']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT regYr FROM carregyear WHERE regYr NOT IN(SELECT regYr FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['regYr']; ?>"><?php echo $rows['regYr']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="regYr_content" id="regYr_content" value="" />
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
                            <td><label>Engine Capacity</label></td>
                            <td>
                                <select id="selected9" 
                                    onchange="document.getElementById('eng_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT engCapacity FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['engCapacity']; ?>" selected>
                                        <?php echo $rows1['engCapacity']; ?>
                                    </option>
                                    
                                    <?php }?>
                                    
                                    <?php
                                        $get = getResults('SELECT engCapacity FROM carenginecapacity WHERE engCapacity NOT IN(SELECT engCapacity FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['engCapacity']; ?>">
                                        <?php echo $rows['engCapacity']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="eng_content" id="eng_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Transmission</label></td>
                            <td>
                                <select id="selected10" 
                                    onchange="document.getElementById('trans_content').value=this.options[this.selectedIndex].text">
                                    <?php
                                        $query1 = 'SELECT transmission FROM vehicle WHERE id=51';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        var_dump($query1);
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                    <option value="<?php echo $rows1['transmission']; ?>" selected>
                                        <?php echo $rows1['transmission']; ?>
                                    </option>
                                    
                                    <?php }?>

                                    <?php
                                        $get = getResults('SELECT transName FROM cartransmission WHERE transName NOT IN(SELECT transmission FROM vehicle WHERE id=51)');
                                        $option = '';
                                        while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['transName']; ?>">
                                        <?php echo $rows['transName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="trans_content" id="trans_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mileage</label></td>
                            <td>
                                <?php
                                    $query1 = 'SELECT mileage FROM vehicle WHERE id=51';
                                    $get1 = $conn->query($query1);
                                    $option1 = '';
                                    while ($rows1 = $get1->fetch_assoc()) {?>
                                    <input type="number" name="mil_content" id="mil_content" value="<?php echo $rows1['mileage']; ?>"/>
                                    
                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="updateAdv2.php">
                                    <input type="submit" value=" Next " name="next" />
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>

<script>
$(document).ready(function(){
    document.getElementById('manu_content').value=document.getElementById('selected1').value;
    document.getElementById('mod_content').value=document.getElementById('selected2').value;
    document.getElementById('modYr_content').value=document.getElementById('selected3').value;
    document.getElementById('con_content').value=document.getElementById('selected4').value;
    document.getElementById('col_content').value=document.getElementById('selected5').value;
    document.getElementById('bod_content').value=document.getElementById('selected6').value;
    document.getElementById('fuel_content').value=document.getElementById('selected7').value;
    document.getElementById('regYr_content').value=document.getElementById('selected8').value;
    document.getElementById('eng_content').value=document.getElementById('selected9').value;
    document.getElementById('trans_content').value=document.getElementById('selected10').value;
});
</script>
</body>

</html>