<?php
    require_once '../connection.php';
    $conn = getDBConnection();
    session_start();
    if(!isset($_GET["vid"])){
        header('Location: http://localhost/carRodioAssignment/sell/sellhomepg.php');
    }else{
        $sql1 ="DELETE FROM vehicle WHERE id=".$_GET["vid"];
        $sql2 ="DELETE FROM carimages WHERE vehicleId=".$_GET["vid"];

        if($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE){
            
            header('Location: http://localhost/carRodioAssignment/sell/sellhomepg.php');
            
        }else{
            echo "Error while deleting vehicle advertisement";
        }
    }

?>
