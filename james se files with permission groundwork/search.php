<html>
    <body>
        <?php
        if ($_GET == NULL){
            session_start();
            $temp = $_SESSION['POST'];
            $_GET['employeeid'] = "$temp[employeeid]";            
            unset($_SESSION['POST']);
        }
        $employeeid = $_GET['employeeid'];
        
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "emis";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $safety = "SELECT * FROM employeelogin WHERE EmployeeID REGEXP '[[:<:]]{$employeeid}[[:>:]]'";
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