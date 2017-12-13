<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page Title</title>
    </head>
    <body style="background-color:rgb(8, 133, 229);color:White;font-size:30px;">
        <h1 style="color:White;font-size:60px;">Insurance Information</h1>
        
        <?php
        $patientid = $_GET['patientid'];
        //echo "$patientid";
        
        $servername = "localhost";
        $username = "root";
        $password = "cs3773";
        $dbname = "EMIS";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
	session_start();
	$user = $_SESSION["user"];
        $safety = "SELECT * FROM PatientLogin WHERE Email='{$user}'";
        $verify = $conn->query($safety);
        $pas = $verify->fetch_assoc();
        

        if (isset($_GET['company'])){
            if ($_GET['company'] != null){
                // $changems = "UPDATE personalinformation SET married = \"" . $_POST['mstatus'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changems = "UPDATE PatientInsuranceInfo SET Company = \"" . $_GET['company'] . "\" WHERE Email='{$user}'";
                $huh = $conn->query($changems);
                if (!$huh){
                    echo "Error: " . $changems . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['group'])){
            if ($_GET['group'] != null){
                //$changeadd = "UPDATE personalinformation SET address = \"" . $_POST['address'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeadd = "UPDATE PatientInsuranceInfo SET GroupID = \"" . $_GET['group'] . "\" WHERE Email='{$user}'";
                $huh = $conn->query($changeadd);
                if (!$huh){
                    echo "Error: " . $changeadd . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['member'])){
            if ($_GET['member'] != null){
                //$changeem = "UPDATE personalinformation SET email = \"" . $_POST['email'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeem = "UPDATE PatientInsuranceInfo SET MemberID = \"" . $_GET['member'] . "\" WHERE Email='{$user}'";
                $huh = $conn->query($changeem);
                if (!$huh){
                    echo "Error: " . $changeem . "<br>" . $conn->error;
                }
            }
        }

        //$test = "SELECT * FROM personalinformation WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"%" . $dob . "%\"";
        $test = "SELECT * FROM PatientInsuranceInfo WHERE Email='{$user}'";

        $result = $conn->query($test);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Insurance Provider: " . $row["Company"] . "<br>" .
                     "Group ID: " . $row["GroupID"] . "<br>" .
                     "Membership ID: " . $row["MemberID"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <form action="EditInsurance.php" method="post">
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <div><input type="submit" value="Edit"/></div>
        </form>
        <form action="../main/Login.php" method="post">
            <input type="hidden" name="user" value="<?php echo $pas['Email'];?>" />
            <input type="hidden" name="passwrd" value="<?php echo $pas['PassWord'];?>" />
            <div><input type="submit" value="Home"></div>
        </form>
    </body>
</html>
