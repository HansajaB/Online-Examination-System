<?php

include("Constant/config.php");
/*
$sql = "SELECT * FROM employee";
$res = mysqli_query($conn,$sql); 

while($row = mysqli_fetch_accos($res)){
    $fname = $row['FirstName']; 
    echo $fname;    
}*/

$sql = "SELECT * FROM employee";
$stmt = $conn->prepare($sql); 
//$stmt->bind_param("i",$aid);
$stmt->execute();
$result = $stmt->get_result();
while ($rows = $result->fetch_assoc()) {
    $fname = $rows['name'];
    echo $fname; 
    ?>
    <br>
    <?php
}


?>