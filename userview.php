<?php

session_start(); 

if(!(isset($_SESSION['empid']))){
    ?>
    <script>
        window.location.replace("login.php");
    </script>y
    <?php
}

$EmpID = $_SESSION['empid']; 

$usertype = $_SESSION['usertype'];
if($usertype == "main"){
    include("partials/adminnav.php"); 
}
else{
    include("partials/nav.php"); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="CSS/userview.css?version=2.7">
    <script src="scripts/addprofilepic.js"></script>
    <script>
        function updatedata(name,fname,username,dob,address,nic,email,phone){
            let uname = document.getElementById("name");    
            let ufname = document.getElementById("fname");  
            let u_username = document.getElementById("username");  
            let udob = document.getElementById("dob");  
            let uaddress = document.getElementById("address");  
            let unic = document.getElementById("nic");   
            let uemail = document.getElementById("email");   
            let u_phone = document.getElementById("phone");
            let imageupdateind = document.getElementById("imageupdateind");

            if(uname.value == name && fname == ufname.value && u_username.value == username &&
            udob.value == dob && uaddress.value == address && unic.value == nic && uemail.value == email && 
            u_phone.value == phone && imageupdateind.value == ""){
                alert("You have not made any changes"); 
            }
            else if(uname.value == "" || ufname.value == "" || u_username.value == "" ||
            udob.value == "" || uaddress.value == "" || unic.value == "" || uemail.value == "" || 
            u_phone.value == ""){
                alert("Empty Fields"); 
            }
            else{
                document.getElementById("formsubmit").click(); 
            }
        }
    </script>

</head>
<body>
            <?php
            $sql = "SELECT * FROM employeedetails WHERE EmpID=?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $EmpID);
            $stmt->execute();
            $result = $stmt->get_result();
            while($rows = $result->fetch_assoc()){
                $Namewithintials = $rows['Namewithintials']; 
                $fullname = $rows['Fullname']; 
                $username = $rows['Username']; 
                $dob = $rows['DOB']; 
                $address = $rows['EmpAddress']; 
                $nic = $rows['EmpNIC'];
                $email = $rows['Email']; 
                $phone = $rows['MobileNumber'];
            }


            ?>

<section class="userviewmain">

<div class="userdetailsviewCon">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="profilepiccontainer">
            <div class="profilepicmaincon">
                <div class="profilepiccon" id="profilepiccon">
                    <img src="<?php echo $profilepic; ?>" alt="" width="100" height="100">
                </div>
                <a href="#" onclick="profilepicadd('<?php echo $profilepic; ?>')">
                    <div class="updateprofilepic" id="photoaddbutton"><h1>+</h1></div>
                </a>
            </div>
        </div>
        <div class="detailvieweditcon">
            <div class="inputdataset">
                <label for="">Name with initials</label>
                <input type="text" name="name" id="name" value="<?php echo $Namewithintials; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Full Name</label>
                <input type="text" name="fname" id="fname" value="<?php echo $fullname; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $username; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Date of birth</label>
                <input type="text" name="dob" id="dob" value="<?php echo $dob; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $address; ?>">
            </div>
            <div class="inputdataset">
                <label for="">NIC Number</label>
                <input type="text" name="nic" id="nic" value="<?php echo $nic; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>">
            </div>
            <div class="inputdataset">
                <label for="">Mobile Number</label>
                <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
            </div>

            <div class="userde_buttoncontainer">
                <a href="#" class="greenbutton" onclick="updatedata('<?php echo $Namewithintials;?>','<?php echo $fullname;?>','<?php echo $username;?>','<?php echo $dob;?>','<?php echo $address;?>','<?php echo $nic;?>','<?php echo $email;?>','<?php echo $phone;?>')">Save</a>
                <a href="forgotpassword.php" target="new" class="orangebutton">Change Password</a>
            </div>

        </div>
        <input type="file" hidden id="image1" name="file">
        <input type="submit" hidden name="submit" id="formsubmit">
        <input type="text" hidden id="imageupdateind" value="">
    </form>
</div>

<div class="currentexamCon">

<div class="eEtopic">Your Exams</div>

<div class="toptablerow">
    <div class="uexamtrowd boldtext">Exam Name</div>
    <div class="uexamtrowd boldtext">Starting Date</div>
    <div class="uexamtrowd boldtext">Cancel</div>           
</div>
<?php



if($usertype == "main"){
    $sql_exm = "SELECT * FROM examdetails WHERE empid=?";
    $stmt_exm = $conn->prepare($sql_exm);
    $stmt_exm->bind_param("i", $EmpID);
    $stmt_exm->execute();
    $result_exm = $stmt_exm->get_result();
    while($rows_exm = $result_exm->fetch_assoc()){
        $exid = $rows_exm['ExamID'];
        $exname = $rows_exm['Examname'];
        $sdate = $rows_exm['startdate'];

        ?>

        <div class="toptablerow">
            <div class="uexamtrowd textalignleft"><?php echo $exname; ?></div>
            <div class="uexamtrowd"><?php echo $sdate;?></div>
            <div class="uexamtrowd"><a href="cancelation.php?id=<?php echo $exid; ?>&&type=exam">Cancel</a></div>           
        </div>
        <?php
    }
}
else{
    $sql_ex = "SELECT * FROM examregistration WHERE EmpID=?";
    $stmt_ex = $conn->prepare($sql_ex); 
    $stmt_ex->bind_param("i", $EmpID);
    $stmt_ex->execute();
    $result_ex = $stmt_ex->get_result();
    while($rows_ex = $result_ex->fetch_assoc()){
        $exid = $rows_ex['ExamID'];
    
        $sql_exm = "SELECT * FROM examdetails WHERE ExamID=?";
        $stmt_exm = $conn->prepare($sql_exm);
        $stmt_exm->bind_param("i", $exid);
        $stmt_exm->execute();
        $result_exm = $stmt_exm->get_result();
        while($rows_exm = $result_exm->fetch_assoc()){
            $exname = $rows_exm['Examname'];
            $sdate = $rows_exm['startdate'];
    
    ?>
    
    <div class="toptablerow">
        <div class="uexamtrowd textalignleft"><?php echo $exname; ?></div>
        <div class="uexamtrowd"><?php echo $sdate;?></div>
        <div class="uexamtrowd"><a href="cancelation.php?id=<?php echo $exid;?>&&type=reg">Cancel</a></div>           
    </div>
    
    
    <?php
    }
    }
}
    ?>


</div>

</section>
<?php include("partials/footer.php")?>
</body>

</html>


<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $name = $_POST['name']; 
    $fname = $_POST['fname']; 
    $username = $_POST['username']; 
    $dob = $_POST['dob']; 
    $address = $_POST['address']; 
    $nic = $_POST['nic']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 

    $fileName = $_FILES['file']['name']; 
    $fileTmpName = $_FILES['file']['tmp_name']; 
    $fileSize = $_FILES['file']['size']; 
    $fileError = $_FILES['file']['error']; 
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileNameNew = uniqid('',true).".".$fileActualExt;
    $fileDestination = 'userprofilepics/'.$fileNameNew; 
    move_uploaded_file($fileTmpName, $fileDestination);

    $sql_add = "UPDATE employeedetails SET Namewithintials=?,Fullname=?,DOB=?,EmpAddress=?,EmpNIC=?,Email=?,MobileNumber=?,Username=?,profilepic=? WHERE EmpID = ?";
    $stmt_add = $conn->prepare($sql_add); 
    $stmt_add->bind_param("sssssssssi",$name,$fname,$dob,$address,$nic,$email,$phone,$username,$fileDestination,$EmpID);
    $stmt_add->execute();

    if($conn == true){
        ?>
        <script>
            window.location.replace("userview.php");
        </script>
        <?php
    }
}


?>
