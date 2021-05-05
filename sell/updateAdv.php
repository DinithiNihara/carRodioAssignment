<?php
    session_start();
    require_once '../connection.php';
    $conn = getDBConnection();
    if(!isset($_GET["vid"])){
        header('Location: http://localhost/carRodioAssignment/sell/sellhomepg.php');
    }
    $vehicleId = $_GET["vid"];
    $sql1 = "SELECT * FROM carrodio1.vehicle where id='".$vehicleId."';";
    $oldCarDetails  = getResults($sql1)->fetch_assoc();
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
        <title>Update Advertisement - Form 1</title>
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
        <div class="form">
            <form action="/carRodioAssignment/sell/updateAdv2.php" method="post">
            <a id="goBack" href="../sell/sellhomepg.php" > <b>&#8592;</b>  Seller Home Page</a>
                <table class="table">
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
                                <select id="selected1" onchange="document.getElementById('manu_content').value=this.options[this.selectedIndex].text">
                                    <option value="<?php echo $oldCarDetails['manufacturer']; ?>" selected>
                                        <?php echo $oldCarDetails['manufacturer']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT manuName FROM carmanufacturer 
                                        WHERE manuName NOT IN(SELECT manufacturer FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['model']; ?>" selected>
                                        <?php echo $oldCarDetails['model']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT modName FROM carmodel WHERE modName NOT IN(SELECT model FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['modelYr']; ?>" selected>
                                        <?php echo $oldCarDetails['modelYr']; ?>
                                    </option>
                                    
                                    <?php
                                        $get = getResults('SELECT modYr FROM modelyear WHERE modYr NOT IN(SELECT modelYr FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['vCondition']; ?>" selected>
                                        <?php echo $oldCarDetails['vCondition']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT conName FROM carcondition WHERE conName NOT IN(SELECT vCondition FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['color']; ?>" selected>
                                        <?php echo $oldCarDetails['color']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT colName FROM carcolor WHERE colName NOT IN(SELECT color FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['bodyType']; ?>" selected>
                                        <?php echo $oldCarDetails['bodyType']; ?>
                                    </option>
                                    
                                    <?php
                                        $get = getResults('SELECT bodType FROM carbodytype WHERE bodType NOT IN(SELECT bodyType FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['fuelType']; ?>" selected>
                                        <?php echo $oldCarDetails['fuelType']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT fuelType FROM carfueltype WHERE fuelType NOT IN(SELECT fuelType FROM vehicle WHERE id='.$vehicleId.')');
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
                            <td>
                                <select id="selected8"
                                    onchange="document.getElementById('regYr_content').value=this.options[this.selectedIndex].text">
                                    <option value="<?php echo $oldCarDetails['regYr']; ?>" selected>
                                        <?php echo $oldCarDetails['regYr']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT regYr FROM carregyear WHERE regYr NOT IN(SELECT regYr FROM vehicle WHERE id='.$vehicleId.')');
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
                        <tr>
                            <td><label><b>Other</label></b></td>
                        </tr>
                        <tr>
                            <td><label>Engine Capacity</label></td>
                            <td>
                                <select id="selected9" 
                                    onchange="document.getElementById('eng_content').value=this.options[this.selectedIndex].text">
                                    <option value="<?php echo $oldCarDetails['engCapacity']; ?>" selected>
                                        <?php echo $oldCarDetails['engCapacity']; ?>
                                    </option>
                                    <?php
                                        $get = getResults('SELECT engCapacity FROM carenginecapacity WHERE engCapacity NOT IN(SELECT engCapacity FROM vehicle WHERE id='.$vehicleId.')');
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
                                    <option value="<?php echo $oldCarDetails['transmission']; ?>" selected>
                                        <?php echo $oldCarDetails['transmission']; ?>
                                    </option>

                                    <?php
                                        $get = getResults('SELECT transName FROM cartransmission WHERE transName NOT IN(SELECT transmission FROM vehicle WHERE id='.$vehicleId.')');
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
                                <input type="number" name="mil_content" id="mil_content" value="<?php echo $oldCarDetails['mileage']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="vid" value="<?php echo $vehicleId?>">
                            </td>
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
