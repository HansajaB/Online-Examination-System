<?php

include("Constant/config.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql_del = "DELETE FROM employeedetails WHERE EmpID = ?";
    $stmt_del = $conn->prepare($sql_del); 
    $stmt_del->bind_param("i", $id);
    $stmt_del->execute();

    if($conn == true){
        echo "User Deleted."; 
    }
}

?>