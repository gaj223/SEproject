<!DOCTYPE html>
<!--
     Verify Patient and load up welcome page
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page Title</title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
                font-size:60px;
                text-align:center;
            }
            
        </style>
    </head>
    <body>
        
        <?php 
        
            //include 'db.emis';
           // Connect to SQL
            $host = "localhost";
            $user = "root";
            $password = "cs3773";
            $database = "EMIS";
            $con = mysqli_connect($host, $user, $password, $database);
            
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            
            //set the default client character set
            mysqli_set_charset($con, 'utf-8');
            
            // Take all submited information and upload them
            #personal
            $date = htmlentities($_POST["date"]);
            $bpressure = htmlentities($_POST["bpressure"]);
            $temp = htmlentities($_POST["temp"]);
            $hrate =  htmlentities($_POST["hrate"]);
            $id = htmlentities($_POST["patient"]);
            
            // enter personal information
            $sql = "INSERT INTO PatientVitals VALUES ( '{$id}' ,"
            . "'{$date}' , '{$bpressure}' , '{$temp}' , '{$hrate}');";
            $personal = mysqli_query($con, $sql);
            if (!$personal) {
		die('Could not insert vitals: ' . mysqli_error($con));
            }
            
            echo 'Vitals Added to the System ';
            
        ?>
        <p style="font-size:20px;">
            For security, please <a href="../index.php">logout</a>
        </p>
        
    </body>
</html>
