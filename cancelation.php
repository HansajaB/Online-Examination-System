
<?php
include("partials/nav.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canclelaion exa page</title>
    <link rel="stylesheet" href="CSS/cancelstyle.css?version=2.2">
</head>
<body>
    <div class="cancelmain">
    <div class="center">
        <h1>Exam Cancelation</h1>
       
        <form method="post">
            <p>Reason for cancel exam :</p>
            <textarea rows="4" cols="50" name="reason" required></textarea>
            <div class="button">
                <input type="submit" name="submit" value="Cancel Exam">
            </div>
        </form>
    </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $userid = $_SESSION['empid']; 
    $examid = $_GET['id']; 
    $reason = $_POST['reason'];
    $type = $_GET['type']; 


    $sql_del = "DELETE FROM examregistration WHERE EmpID = ? && ExamID = ? ;";
    $stmt_del = $conn->prepare($sql_del); 
    $stmt_del->bind_param("ii", $userid,$examid);
    $stmt_del->execute();

    
    if($conn == true){

        $sql = "INSERT INTO registercancel(examid,empid,reason,ctype) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("iiss", $examid,$userid,$reason,$type);
        $stmt->execute();
        ?>
        <script>
            window.location.replace("userview.php");
        </script>
        <?php
    }

}

?>


