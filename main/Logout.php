<!--
    Logouts the User
-->
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
        <h1 style="font-size:70px;"> 
                <img src="../Symbol.png" width="60" height="60">
                EMIS  <hr> 
        </h1>    
        <p> 
            You have been logout. To ensure that you are successfully logged out, we recommend that you close all instances of your web browser. If you are using a shared or otherwise unsecure computer, 
            we recommend you log off of the computer before leaving it unattended.
        </p>
        <p>
            <a href="../index.php"> Home</a> 
        </p>
        <?php
            unset($_SESSION);
            session_destroy();
            session_write_close(); 
            die;
        ?>
    </body>
</html>

