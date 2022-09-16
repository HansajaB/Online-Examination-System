<?php
include("partials/nav.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSS/exam.css?version=1.5">
</head>
<body>
<div class="maincontainer">
    <div class="header">Exam Registration</div>
    <div class="formmainContainer">
        <div class="formContainer">
            <div class="getDetailsCon">
                <div class="DetailElement">
                    <label for="exam">Exam</label>
                    <select name="exam" id="exam" class="resselect">
                        <option hidden value="none">Select the Exam</option>
                        <option value="CCNA">CCNA</option>
                        <option value="CCNP">CCNP</option>
                        <option value="CCIE">CCIE</option>
                    </select>
                </div>
                <div class="DetailElement">
                    <label for="exam">Exam</label>
                    <input type="text" name="empid" id="empid" placeholder="Enter the employee ID" class="resinput">
                </div>
            </div>
            <div class="buttoncontainer">
              <input type="submit" name="submit" value="Search" class="submitBTN">
            </div>
            <div class="resContainer">
                <h1>Result</h1>
                <div class="innermaincon">
                    <div class="innerElement darkgray" id="resExam">EXAM</div>
                    <div class="innerElement darkgray" id="res">RESULT</div>
                </div>
                <div class="innercon">
                    <div class="innerElement lightgray" id="resExam">CCCC</div>
                    <div class="innerElement lightgray" id="res">100</div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>

<?php
include("partials/footer.php"); 
?>

