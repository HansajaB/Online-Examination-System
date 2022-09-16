<?php
include("partials/nav.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Information</title>
    <link rel="stylesheet" href="CSS/infor.css?version=2.6">
    
</head>
<body>
    <section class="cta">
        <h1>Avilable Exam Information</h1>
        <div class="main" >
            <img class="myImg" src="./imgNew/avel-chuklanov-DUmFLtMeAbQ-unsplash.jpg" >
            <img class="myImg" src="./imgNew/book-759.jpg" >
            <img class="myImg" src="./imgNew/j-kelly-brito-PeUJyoylfe4-unsplash.jpg">
          </div>
          
          <script>
          var indexL = 0;
          carousel();
          
          function carousel() {
            var i;
            var x = document.getElementsByClassName("myImg");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
            }
            indexL++;
            if (indexL > x.length) {indexL = 1}    
            x[indexL-1].style.display = "block";  
            setTimeout(carousel, 2000); 
          }
          </script>
    </section>

    <section class="row">
        <div class="course-col">
            <h2><a href="mange.php">Project Management Exam </a></h2>
            <p style="color: red;"> Exam PM102</p>
            <p class="description">PMC exam is ideal for 
                professionals with less experience in managing company fields..</p>

                <div class="button">
                    <a href="examregistration.php" class="enrollbutton">Enroll</a>
                </div>
        </div>
        <div class="course-col">
            <h2><a href="bankin.php">Banking Management Exam</a> </h2>
            <p style="color: red;">Exam BM101</p>
            <p class="description">The exam evaluates 
                students Knowledge and understanding...</p>
                <div class="button">
                    <a href="examregistration.php" class="enrollbutton">Enroll</a>
                </div>
                
        </div>
        <div class="course-col">
            <h2><a href="busnAnal.php">Business Analyst Exam</a></h2>
            <p style="color: red;">Exam BA304</p>
            <p class="description">Business analysts 
                typicaly use IT resouces to help...</p>

                <div class="button">
                    <a href="examregistration.php" class="enrollbutton">Enroll</a>
                </div>
               
        </div>
        <div class="course-col">
            <h2><a href="skill.php">Skilled Trade Exam</a> </h2>
            <p style="color: red;">Exam ST112</p>
            <p class="description">Proffesionals who 
                skilled in trades usually earn more...</p>
                <div class="button">
                    <a href="examregistration.php" class="enrollbutton">Enroll</a>
                </div>
              
        </div>
        <div class="course-col">
            <h2><a href="hr.php">Human Resource Certification Exam</a></h2>
            <p style="color: red;">Exam HR203</p>
            <p class="description">For those 
                in the field of human resources.... </p>

                <div class="button">
                    <a href="examregistration.php" class="enrollbutton">Enroll</a>
                </div>
                
        </div>
</section>
<?php
include("partials/footer.php"); 
?>



    

</body>
</html>