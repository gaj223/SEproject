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
    <body style="font-family:verdana;background-color:rgb(8, 133, 229);color:White;font-size:30px;">
        <h1 style="color:White;font-size:60px;">Personal Information</h1>
        
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
	$user = $_SESSION['user'];
	$sql = "SELECT PatientID FROM PatientPersonalInfo WHERE Email='{$user}'";
	$q = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($q);
	$patientid = $row['PatientID'];

        $safety = "SELECT * FROM PatientPersonalInfo WHERE PatientID='{$patientid}'";
        $verify = $conn->query($safety);
        $pas = $verify->fetch_assoc();
        

        if (isset($_GET['mstatus'])){
            if ($_GET['mstatus'] != null){
                // $changems = "UPDATE personalinformation SET married = \"" . $_POST['mstatus'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changems = "UPDATE PatientPersonalInfo SET mstatus = '" . $_GET['mstatus'] . "' WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changems);
                if (!$huh){
                    echo "Error: " . $changems . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['address'])){
            if ($_GET['address'] != null){
                //$changeadd = "UPDATE personalinformation SET address = \"" . $_POST['address'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeadd = "UPDATE PatientPersonalInfo SET address = \"" . $_GET['address'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changeadd);
                if (!$huh){
                    echo "Error: " . $changeadd . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['email'])){
            if ($_GET['email'] != null){
                //$changeem = "UPDATE personalinformation SET email = \"" . $_POST['email'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeem = "UPDATE PatientPersonalInfo SET Email = \"" . $_GET['email'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changeem);
                if (!$huh){
                    echo "Error: " . $changeem . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['pnumber'])){
            if ($_GET['pnumber'] != null){
                //$changepn = "UPDATE personalinformation SET phonenumber = \"" . $_POST['pnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changepn = "UPDATE PatientPersonalInfo SET phone = \"" . $_GET['pnumber'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changepn);
                if (!$huh){
                    echo "Error: " . $changepn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecname'])){
            if ($_GET['ecname'] != null){
                //$changeecn = "UPDATE personalinformation SET ecname = \"" . $_POST['ecname'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecn = "UPDATE PatientPersonalInfo SET ecname = \"" . $_GET['ecname'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changeecn);
                if (!$huh){
                    echo "Error: " . $changeecn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecpnumber'])){
            if ($_GET['ecpnumber'] != null){
                //$changeecp = "UPDATE personalinformation SET ecphonenumber = \"" . $_POST['ecpnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecp = "UPDATE PatientPersonalInfo SET ecphone = \"" . $_GET['ecpnumber'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changeecp);
                if (!$huh){
                    echo "Error: " . $changeecp . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecrelationship'])){
            if ($_GET['ecrelationship'] != null){
                //$changeecr = "UPDATE personalinformation SET ecrelation = \"" . $_POST['ecrelationship'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecr = "UPDATE PatientPersonalInfo SET ecrelation = \"" . $_GET['ecrelationship'] . "\" WHERE PatientID='{$patientid}'";
                $huh = $conn->query($changeecr);
                if (!$huh){
                    echo "Error: " . $changeecr . "<br>" . $conn->error;
                }
            }
        }

        //$test = "SELECT * FROM personalinformation WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"%" . $dob . "%\"";
        $test = "SELECT * FROM PatientPersonalInfo WHERE PatientID='{$patientid}'";

        $result = $conn->query($test);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "First Name: " . $row["firstname"] . "<br>" .
                     "Last Name: " . $row["lastname"] . "<br>" .
                     "D.O.B: " . $row["dob"] . "<br>" .
                     "Gender: " . $row["gender"] . "<br>" .
                     "Marital Status: " . $row["mstatus"] . "<br>" .
                     "Address: " . $row["address"] . "<br>" .
                     "E-mail: " . $row["Email"] . "<br>" .
                     "Phone Number: " . $row["phone"] . "<br>" .
                     "S.S.N: " . $row["ssn"] . "<br>" .
                     "Emergency Contact Name: " . $row["ecname"] . "<br>" .
                     "Emergency Contact Phone Number: " . $row["ecphone"] . "<br>" .
                     "Emergency Contact Relation: " . $row["ecrelation"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <form action="edit.html.php" method="post">
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


