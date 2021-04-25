<?php
    session_start();
    require_once '../connection.php';
    $conn = getDBConnection();
    if(!isset($_POST)){
        header('Location: http://localhost/carRodioAssignment/sell/sellhomepg.php');
    }
    $vehicleId = $_SESSION['vehicle_id'];
    $manu_content = $_SESSION['manu_content'];
    $mod_content = $_SESSION['mod_content'];
    $modYr_content = $_SESSION['modYr_content'];
    $con_content = $_SESSION['con_content'];
    $col_content = $_SESSION['col_content'];
    $bod_content = $_SESSION['bod_content'];
    $fuel_content = $_SESSION['fuel_content'];
    $regYr_content = $_SESSION['regYr_content'];
    $eng_content = $_SESSION['eng_content'];
    $trans_content = $_SESSION['trans_content'];
    $mil_content = $_SESSION['mil_content'];
    $sname = $_POST["sname"];
    $scno = $_POST["scno"];
    $semail = $_POST["semail"];
    $sloc = $_POST["sloc"];
    $price = $_POST["price"];
    $adDetails = $_POST["adDetails"];

    var_dump($_SESSION);
    var_dump($_FILES);

    $sql = "UPDATE vehicle SET 
        manufacturer='$manu_content',
        model='$mod_content',
        modelYr='$modYr_content',
        vCondition='$con_content',
        color='$col_content',
        bodyType='$bod_content',
        fuelType='$fuel_content',
        regYr='$regYr_content',
        engCapacity='$eng_content',
        transmission='$trans_content',
        mileage='$mil_content',
        sname='$sname',
        scno='$scno',
        semail='$semail',
        sloc='$sloc',
        price='$price',
        addDetails='$adDetails' WHERE id=" . $vehicleId;

    if ($conn->query($sql) === TRUE) {
        //Succesfully updated
        header('Location: http://localhost/carRodioAssignment/buy/advpg.php?vid=' . $vehicleId);
   
        /*echo "(<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Vehicle information updated successfully.')
            
            </SCRIPT>)";*/
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // File upload configuration
    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                    $sql2 = "SELECT MAX(id) FROM vehicle";
                    $result = $conn->query($sql2);
                    $vehicleid = $result->fetch_assoc();
                    $vid = implode(" ", $vehicleid);

                    // Image db insert sql
                    // $insertValuesSQL .= "('".$fileName."', NOW(),'".$vid."'),";

                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = $conn->query("UPDATE carimages SET fileName='$fileName', uploadedOn='NOW()' WHERE vehicleId=51");
            if ($insert) {
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // $statusMsg = 'Please select a file to upload.';
    }

    // Display status message
    echo $statusMsg;

