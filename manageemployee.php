<?php
include("partials/adminnav.php"); 
$userid = $_SESSION['empid']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/manageuser.css?version=1.2">
    <title>Document</title>

    <script>//js
        function deleteuser(id){
            var xhr = new XMLHttpRequest();//htttp req 
            xhr.open('POST', 'deleteuser.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {//action eka iwara unata passe
                window.location.replace("manageemployee.php");
            };
            xhr.send(`id=${id}`);
        }
    </script>
</head>
<body>
    <section class="viewusermaincon33">
    
        <div class="usertablemaincontainer">
        <div class="usertabletoprow">
            <div class="utelement textbold">Full name</div>
            <div class="utelement textbold">Date of Birth</div>
            <div class="utelement textbold">NIC</div>
            <div class="utelement textbold">Email</div>
            <div class="utelement textbold">Phone Number</div>
            <div class="utelement textbold">Delete</div>
        </div>
        <?php
        
        $sql = "SELECT * FROM employeedetails WHERE usertype='user'";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result();
        while($rows = $result->fetch_assoc()){
            $empid = $rows['EmpID']; 
            $fname = $rows['Fullname']; 
            $dob = $rows['DOB']; 
            $nic = $rows['EmpNIC']; 
            $email = $rows['Email'];
            $phone = $rows['MobileNumber']; 
?>



        <div class="usertabletoprow">
            <div class="utelement"><?php echo $fname; ?></div>
            <div class="utelement"><?php echo $dob; ?></div>
            <div class="utelement"><?php echo $nic; ?></div>
            <div class="utelement"><?php echo $email; ?></div>
            <div class="utelement"><?php echo $phone; ?></div>
            <div class="utelement"><a href="#" onclick="deleteuser('<?php echo $empid;?>')">Delete</a></div>
        </div>



<?php


        }

        ?>

        </div>
    </section>
</body>
</html>