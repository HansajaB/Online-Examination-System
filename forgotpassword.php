<?php
session_start();
if(isset($_SESSION['empid'])){
  include("partials/nav.php"); 
}
else{
  session_abort(); 
  include("Constant/config.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSS/frogotpassword.css?version=1.6">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <?php
  if(!isset($_SESSION['empid'])){?>
    <link rel="stylesheet" href="CSS/fontload.css">
  <?php }
  ?>
  
  <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

  <script>
    function updatepassword(){
      let pass = document.getElementById("password").value; 
      let cpass = document.getElementById("cpassword").value; 

      if(pass == "" ||  cpass == ""){
        alert("Empty Fields"); 
      }
      else if(pass == cpass){
        document.getElementById("submit1").click(); 
      }
      else{
        alert("Password not matched"); 
      }
    }
    function updatepassword2(){
      let user = document.getElementById("username").value; 
      let pass = document.getElementById("password1").value; 
      let cpass = document.getElementById("cpassword1").value; 

      if(pass == "" ||  cpass == "" || user == ""){
        alert("Empty Fields"); 
      }
      else if(pass == cpass){
        document.getElementById("submit2").click(); 
      }
      else{
        alert("Password not matched"); 
      }
    }
  </script>

</head>
<body>
  <section class="fp_maincontainer">
    <form action="#" method="post">
      <div class="fpformcontainer">
        <div class="fptopic">Frogot Password</div>
        <?php
        if(isset($_SESSION['empid'])){ //user loged in ?>
          <label for="">New Password</label>
          <input type="password" name="password" id="password" required>
          <label for="">Confirm Password</label>
          <input type="password" name="cpassword" id="cpassword" required>
          <div class="fpbuttoncon">
            <a href="#" onclick="updatepassword()">Update</a>
          </div>
        <?php }
        else{ //usernot loged in ?>
          <label for="">Username</label>
          <input type="text" name="username" id="username" required>
          <label for="">New Password</label>
          <input type="password" name="password1" id="password1" required>
          <label for="">Confirm Password</label>
          <input type="password" name="cpassword1" id="cpassword1" required>
          <div class="fpbuttoncon">
            <a href="#" onclick="updatepassword2()">Update</a>
          </div>
        <?php }
        ?>
      </div>
      <input type="submit" hidden name="submit1" id="submit1">
      <input type="submit" hidden name="submit2" id="submit2">
    </form>
  </section>
</body>
</html>

<?php

if(isset($_POST['submit1'])){
  
  $password = md5($_POST['password']); 
  $userid = $_SESSION['empid']; 

  $sql = "UPDATE employeedetails SET Password=? WHERE EmpID = ?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("si",$password,$userid);
  $stmt->execute();

  if($conn == true){
    unset($_SESSION['empid']);
      ?>
      <script>
          window.location.replace("login.php");
      </script>
      <?php
  }
}

if(isset($_POST['submit2'])){
  
  $password = md5($_POST['password1']); 
  $username = $_POST['username'];

  $sql = "UPDATE employeedetails SET Password=? WHERE Username = ?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("si",$password,$username);
  $stmt->execute();

  if($conn == true){
      ?>
      <script>
          window.location.replace("login.php");
      </script>
      <?php
  }
}

?>