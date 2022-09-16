<?php
include("partials/adminnav.php"); 

$empid = $_SESSION['empid']; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/test1.css?version=2.7">
    <link rel="stylesheet" href="CSS/exam.css?version=1.7">

    <script>
        function deleteexam(id){
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'examdelete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                alert(this.responseText);
                window.location.replace("viewexam.php");
            };
            xhr.send(`examid=${id}`);
        }
    </script>

</head>
<body>
    <div class="viewexammain">
        <?php
        
            $sql = "SELECT * FROM examdetails WHERE empid=?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i",$empid);
            $stmt->execute();
            $result = $stmt->get_result();
            while($rows = $result->fetch_assoc()){
                $exid = $rows['ExamID']; 
                $examname = $rows['Examname']; 
                $examdetails = $rows['Examdetails']; 
                $startingsate = $rows['Startingdate']; 
                $deadline = $rows['Deadline']; 
                ?>
                <div class="examelementmaincon">

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
                        <a href="#" class="dangerbutton" onclick="deleteexam('<?php echo $exid;?>')">Delete</a>
                        </div>
                    </div>

                </div>
                <?php
            }
        ?>
    </div>
</body>
</html>