<?php
include("Constant/config.php");

if(isset($_POST['examid'])){
    $examid = $_POST['examid']; 
    $sql_del = "DELETE FROM examdetails WHERE ExamID = ?";
    $stmt_del = $conn->prepare($sql_del); 
    $stmt_del->bind_param("i", $examid);
    $stmt_del->execute();

    if($conn == true){
        echo "Exam Deleted."; 
    }
}

?>