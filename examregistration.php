<?php
include("partials/nav.php"); 
$userid = $_SESSION['empid']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSS/exam.css?version=1.4">

  <script>
    function register(examid,userid){
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'Examregister.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function () {
        window.location.replace("userview.php");
      };
      xhr.send(`exid=${examid}&&userid=${userid}`);
    }
  </script>

</head>
<body>
  <div class="maincontainer">
    <div class="header">Exam Registration</div>
    <div class="formmainContainer">
    <?php
            $sql = "SELECT * FROM examdetails";
            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($rows = $result->fetch_assoc()){
                $exid = $rows['ExamID']; 
                $examname = $rows['Examname']; 
                $examdetails = $rows['Examdetails']; 
                $startingsate = $rows['Startingdate']; 
                $deadline = $rows['Deadline']; 


                $sql_check = "SELECT COUNT(*) FROM examregistration WHERE EmpID = ? && ExamID = ?";
                $stmt_check = $conn->prepare($sql_check); 
                $stmt_check->bind_param("ii", $userid,$exid);
                $stmt_check->execute();
                $rows_check = $stmt_check->get_result()->fetch_row();

                if($rows_check[0] == 0){
                  ?>
                
                  <div class="examcontainer">
                    <div class="examrow">
                      <div class="examconinner textbold">Exam Name</div>
                      <div class="examconinner textbold">Exam Details</div>
                      <div class="examconinner textbold">Starting time</div>
                      <div class="examconinner textbold">Deadline</div>
                    </div>
                    <div class="examrow">
                      <div class="examconinner"><?php echo $examname; ?></div>
                      <div class="examconinner"><?php echo $examdetails; ?></div>
                      <div class="examconinner"><?php echo $startingsate; ?></div>
                      <div class="examconinner"><?php echo $deadline; ?></div>
                    </div>
  
                    <div class="exambuttoncon">
                      <a href="#" class="exambuttoncongreen" onclick="register('<?php echo $exid;?>','<?php echo $userid; ?>')">Register</a>
                    </div>
                  </div>
  
                  <?php
                }
            }


            ?>
    </div>
  </div>
</body>
</html>

<?php
include("partials/footer.php"); 
?>


