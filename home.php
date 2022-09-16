<?php
include("partials/homenav.php"); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/main.css?version=2.3">
    <link rel="stylesheet" href="CSS/index.css?version=2.5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
            <?php
            $sql = "SELECT * FROM employeedetails WHERE EmpID=?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $EmpID);
            $stmt->execute();
            $result = $stmt->get_result();
            while($rows = $result->fetch_assoc()){
                $fullname = $rows['Fullname']; 
                $username = $rows['Username']; 
                $profilepic = $rows['profilepic'];
            }


            ?>
    <section class="mainContainer">
        <section id="slider">
                <input type="radio" name="slider" id="s1" checked>
                <input type="radio" name="slider" id="s2">
                <input type="radio" name="slider" id="s3">
        
            
            <label for="s1" id="slide1"><img src="img/3.png" alt=""></label>
            <label for="s2" id="slide2"><img src="img/hr.jpg" alt="" width="1000" height="475"></label>
            <label for="s3" id="slide3"><img src="img/bank.png" alt="" width="1000" height="475"></label>
        
        </section>

        <div class="annupCon">
           <div class="annupSubCon">
            <h1>Announcement</h1>   
               <div class="subinner">
                    <ul>
                    <li>Scheduled Mainatince</li>
                        <li>Site access hours</li>
                        <li>Application for membership</li>
                        <li>Resorces</li>
                        <li>Registration details</li>
                        <li>Extention of registration</li>
                        <li>Supplementary Exams details</details></li>
                    </ul>
               </div>             
           </div>   
           <div class="annupSubCon">
                <h1>Upcoming Exams</h1>
                <div class="subinner">
                <ul>
                <?php
                       $sql = "SELECT Examname FROM examdetails";
                           $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<li> " . $row["Examname"] ;
                        }
                        } else {
                            echo "<li>0 results</li>";
                        }
                     ?>
                    </ul>
                </div>
            </div>
        </div>
 
<?php include("partials/footer.php")?>

    </section>
</body>



</html>
