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
            $ecname =  htmlentities($_POST["ecname"]);
            $ecphone = htmlentities($_POST["ecphone"]);
            $ecrelation = htmlentities($_POST["ecrelation"]);
            $mstatus = htmlentities($_POST["mstatus"]);
            #insurance
            $company = htmlentities($_POST["company"]);
            $group = htmlentities($_POST["group"]);
            $member = htmlentities($_POST["member"]);
            #Login
            $passwrd = htmlentities($_POST["passwrd"]);
            $SQuest1 = htmlentities($_POST["SQuest1"]);
            $SAns1 = htmlentities($_POST["SAns1"]);
            $SQuest2 = htmlentities($_POST["SQuest2"]);
            $SAns2 = htmlentities($_POST["SAns2"]);
            
            // enter personal information
            $sql = "INSERT INTO PatientPersonalInfo(firstname, lastname, dob, address, Email,"
            . "phone, ssn, gender, ecname, ecphone, ecrelation, mstatus) VALUES ( '{$first}' ,"
            . "'{$last}' , '{$birth}' , '{$address}' , '{$user}', '{$phone}' , "
            . "{$ssn} , '{$gender}', '{$ecname}', '{$ecphone}' , '{$ecrelation}' , '{$mstatus}');"; //, 'No', 0);" ; 
            $personal = mysqli_query($con, $sql);
            if (!$personal) {
		die('Could not insert Personal Information: ' . mysqli_error($con));
            }
            // enter Insurance information
            $sql = "INSERT INTO PatientInsuranceInfo VALUES ('{$ID}', '{$group}', '{$company}', '{$user}');";
            $insurance = mysqli_query($con, $sql);
            if (!$insurance) {
		die('Could not insert Insurance Information: ' . mysqli_error($con));
            }        
            
            // enter login information
            $sql = "INSERT INTO PatientLogin(Email, PassWord, SecurityQues1, SecurityAns1,"
	    . "SecurityQuest2, SecurityAns2) VALUES ( '{$user}' , "
            . "'{$passwrd}' , '{$SQuest1}' , '{$SAns1}' , '{$SQuest2}' , '{$SAns2}');";
            $login = mysqli_query($con, $sql);
            if (!$login) {
		die('Could not insert Login Information: ' . mysqli_error($con));
            }
            
            
            echo 'Patient Added to the System ';
            
        ?>
        <p style="font-size:20px;">
            For security, please <a href="../index.php">logout</a>
        </p>
        
    </body>
</html>
