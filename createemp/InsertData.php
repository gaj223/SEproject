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
            $ID = htmlentities($_POST["ID"]);
            $first = htmlentities($_POST["first"]);
            $last = htmlentities($_POST["last"]);
            $birth =  htmlentities($_POST["birth"]);
            $address = htmlentities($_POST["address"]);
            $email = htmlentities($_POST["email"]);
            $gender = htmlentities($_POST["gender"]);
            $phone = htmlentities($_POST["phone"]);
            $ssn =  htmlentities($_POST["ssn"]);
            $user = htmlentities($_POST["email"]);
	    $position = htmlentities($_POST["position"]);
	    $permission = htmlentities($_POST["permission"]);
            #Login
            $passwrd = htmlentities($_POST["passwrd"]);
            $SQuest1 = htmlentities($_POST["SQuest1"]);
            $SAns1 = htmlentities($_POST["SAns1"]);
            $SQuest2 = htmlentities($_POST["SQuest2"]);
            $SAns2 = htmlentities($_POST["SAns2"]);
            
            // enter login information
            $sql = "INSERT INTO EmployeeLogin(Email, PassWord, SecurityQuest1, SecurityAns1,"
	    . "SecurityQuest2, SecurityAns2, position, SSN, permission) VALUES ( '{$user}' , "
            . "'{$passwrd}' , '{$SQuest1}' , '{$SAns1}' , '{$SQuest2}' , '{$SAns2}', '{$position}', '{$ssn}', '{$permission}');";
            $login = mysqli_query($con, $sql);
            if (!$login) {
		die('Could not insert Login Information: ' . mysqli_error($con));
            }
            
            
            echo 'Employee Added to the System ';
            
        ?>
        <p style="font-size:20px;">
            For security, please <a href="../index.php">logout</a>
        </p>
        
    </body>
</html>
