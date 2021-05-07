<?php
    require_once '../connection.php';
    $conn = getDBConnection();
    session_start();
   
    if(!isset($_GET["vid"])){
        header('Location: http://localhost/carRodioAssignment/admin/verifyadd.php');

    }else{
        
        $vid=$_GET["vid"];
        $sql ="INSERT INTO vehiclestatus(vid,vstatus) VALUES ('$vid','approved')";


        if($conn->query($sql)===TRUE){
        
            require_once ('../register/Exception.php');
            require_once ('../register/class.phpmailer.php');
            require_once ('../register/class.smtp.php');
            require_once ('../register/PHPMailerAutoload.php');

            $mail = new \PHPMailer\PHPMailer\PHPMailer();

            $query="SELECT * FROM vehicle WHERE id=$vid";
            $get1 = $conn->query($query)or die($conn->error);
            while ($rows1 = $get1->fetch_assoc()) {
                $email=$rows1['semail'];
                $name=$rows1['sname'];

                $mail->setFrom("niharaarts1@gmail.com");
                $mail->addAddress($email);
                $mail->addReplyTo("niharaarts1@gmail.com","CarRodio");
                $mail->isHTML(true);

                $mail->isSMTP(); // send as HTML
                $mail->Host = "smtp.gmail.com"; // SMTP servers
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->Username = "niharaarts1@gmail.com"; // Your mail
                $mail->Password = '3Dinithi3Nihara3'; // Your password mail
                $mail->Port = 587; //specify SMTP Port
                $mail->SMTPSecure = 'tls';   

                $mail->Subject = "Advertisement - Approved";
                $mail->Body = $name .", your vehicle advertisement - ".$vid." has been approved.";
                
            }  
            if(!$mail->send()) 
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else 
            {
                echo '<script>confirm("Seller has been informed.");
                window.location.href="http://localhost/carRodioAssignment/admin/verifyadd.php";</script>';        
            }
            
        }else{
            echo '<script>alert("Error while approving the vehicle advertisement")</script>';
        }
    }

?>