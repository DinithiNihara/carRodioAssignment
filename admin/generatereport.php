<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/genreport.css" rel="stylesheet">
        

        
        <title>Generate Report page</title>
        <script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>

    </head>

    <body>

        <script src="../js/imgupload.js"></script>
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

        <div class="report_container">

            <h2>Generate Reports</h2> <br> <br> 

            <div> <p> Highest Reached Advertisement Report</p>   <a href="highestadd.php" ><input type="button"  class="link"  value="Generate" name="verify" /> </a> <br> <br>      </div>
            <div> <p> Most Engaged Buyer Report</p>    <a href="buyerreport.php"    ><input type="button"  class="link"value="Generate"  name="manage" /> </a> <br> <br>     </div>
            <div> <p> Number Of Advertisements Report </p>   <a href="numadd.php"  > <input type="button"  class="link"value="Generate" name="genreport" /> </a> <br> <br>      </div>
            <div>  <a href="adminhomepg.php"  class="admin_btn" ><input type="button"   value="Admin Panel" name="admin" /> </a>        </div>

        </div>
    </body>
</html>
