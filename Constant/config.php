<?php

        //session
        session_start(); 

        //non-repeating values 
        define('SITEURL', 'http://localhost/OnlineExaminationSystem'); 
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root'); 
        define('DB_PASSWORD', '');  
        define('DB_NAME', 'onlineExaminationSystem'); 

        //connecting the database and saving the data
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());  
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); 
        ?>