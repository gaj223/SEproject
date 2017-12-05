<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
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
        
        if ($_GET == NULL){
            session_start();
            $temp = $_SESSION['POST'];
            $_GET['employeeid'] = "$temp[employeeid]";            
            unset($_SESSION['POST']);
        }
        $employeeid = $_GET['employeeid'];
        
 
        
        $safety = "SELECT * FROM EmployeeLogin WHERE EmployeeID REGEXP '[[:<:]]{$employeeid}[[:>:]]'";
        $verify = $conn->query($safety);
        $pas = $verify->fetch_assoc();
        ?>
        <h1>Search</h1>
        <form action="searchresults.php" method="post">
            First Name: <input type="text" name="fname" /><br><br>
            Last Name: <input type="text" name="lname" /><br><br>
            D.O.B.: <input type="date" name="dob" /><br><br>
            <input type="hidden" name="employeeid" value="<?php echo $employeeid;?>"/>
            <div><input type="submit" value="Search"/></div>
        </form>
        <form action="LoginEmployee.php" method="post">
            <input type="hidden" name="user2" value="<?php echo $pas['Email'];?>" />
            <input type="hidden" name="passwrd2" value="<?php echo $pas['Password'];?>" />
            <div><input type="submit" value="Home"></div>
        </form>
    </body>
</html>