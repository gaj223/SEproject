<!--
    Prompts the user to enter
Connect the SQL and EMIS database
-->
<?php

    // Connect to SQL
    $host = "localhost";
    $user = "root";
    $password = "cs3773";
    $database = "EMIS";

    $con = mysqli_connect($host, $user, $password);
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }


    // Create database, use said database
    $sql = "CREATE DATABASE $database";
    $rs = mysqli_query($con, $sql);
    $sql = "USE $database";
    $rs = mysqli_query($con, $sql);

    //set the default client character set
    mysqli_set_charset($con, 'utf-8');

    // pointless code Check if PatientLogin table exists
    //$sql = 'SELECT 1 FROM PatientLogin LIMIT 1;';
    //$rs = mysqli_query($con, $sql);
    /*  Ignore this If the table exists (i.e. no errors returned), do nothing, else create the table
       and make the user 'cs3773' with password 'cs3773'*/
    // Create table and make user cs3773@cs3773.com with password cs3773
    $sql = 'CREATE TABLE PatientLogin (PatientID int(11),        Email varchar(255),     PassWord varchar(255),
					   SecurityQues1 char(255),  SecurityAns1 char(255), 
					   SecurityQuest2 char(255), SecurityAns2 char(255));';
    $rs = mysqli_query($con, $sql);
    $sql = "INSERT INTO PatientLogin(PatientID, Email, PassWord) VALUES ('3', 'cs3773@cs3773.com', 'cs3773');";
    $rs = mysqli_query($con, $sql);
    if (!$rs) {
	die("Unable to insert: " . mysqli_error($con));
    }
    //Select EMIS database
    //mysqli_select_db($con, "EMIS");
?>

