<?php

include("Constant/config.php");

if(isset($_POST['userid'])){
    $userid = $_POST['userid']; 
    $examid = $_POST['exid']; 

    $date = date('Y-M-d');
    date_default_timezone_set("Asia/Colombo");
    $time = date('H:i a');

    $sql = "INSERT INTO examregistration(EmpID,ExamID,RegisteredDate) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("iis", $userid,$examid,$date);
    $stmt->execute();

    if($conn == true){
        echo "Done"; 
    }
}
?>