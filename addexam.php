<?php
include("partials/adminnav.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/test1.css?version=2.5">
</head>
<body>
    <div class="adminaddexammain">
    <div class="full">
    </br>
        <form class="addexformcontainer" method="POST">
            <div class="one">
                <h2>Add Exams</h2><br>
                <div class="row">
                    <div class="input">
                        <input type="text" name="name" id="name" required>
                        <label for="name"><i class="fa-solid fa-books"></i>Exam name</label>
                    </div>   
                    <div class="input">
                        <input class="date" type="text" name="examdate" id="date" required onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                        <label for="id">Exam Date</label>
                    </div>   
                    </div>
                    <div class="input">
                        <input class="date" type="text" name="regdate" id="rdate" required onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                        <label for="dur">Registration Starting Date</label>
                    </div>   
                    <div class="input">
                        <input class="date" type="text" name="ddate" id="date" required onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                        <label for="name">Registration Deadline</label>
                    </div>    
                    <div class="input">
                        <textarea rows = "5" cols = "60" name = "description" required></textarea>
                        <label for="ins">Exam Details</label>
                    </div>   
                    <input type="submit" name="submit" value="Add" class="addexsubmitbutton">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $examdate = $_POST['examdate']; 
    $regdate = $_POST['regdate']; 
    $deadline = $_POST['ddate'];
    $description = $_POST['description'];
    $empid = $_SESSION['empid'];

    $sql = "INSERT INTO examdetails(empid,Examname,Examdetails,Startingdate,Deadline,startdate) VALUE(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("isssss",$empid,$name,$description,$regdate,$deadline,$examdate);
    $stmt->execute();

    if($conn == true){
        ?>
        <script>
            alert("Exam Added");
        </script>
        <?php
    }


}

?>