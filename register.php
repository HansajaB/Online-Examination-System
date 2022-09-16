<?php
include("Constant/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/Registerstyle.css?version=2" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>



    
    
    <title>Sign in & Sign up Form</title>
  </head>
  <body>


     

    <div class="container">
      <div class="forms-container">
        <div class="signup">
          <form action="#" method="POST" class="sign-up-form" name="signup" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-file-alt"></i>
              <input type="text" required placeholder="Name with intials" id="registerName"  name="namew">
            </div>
            <div class="input-field">
              <i class="far fa-file-alt"></i>
              <input type="text" required placeholder="Full Name" name="fname">
            </div>
            <div class="input-field">
              <i class="fa fa-calendar"></i>
              <input type="date"required placeholder="Date OF Birth" name="date">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" required placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" required placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="pws" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="password">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>

            <div class="select-input">
              <select name="gender"  required id="gender" class="select-input-field">
             <i class="fas fa-restroom"></i>
                  <option value="male">Male</option>
                  <option value="Femail">Femail</option>
              </select>
            </div>
            <div class="input-field">
              <i class="fa fa-mobile-phone"></i>
              <input
                type="text"
                name="nic"
                placeholder="National Identity Number"
                required
              >
            </div>
            <div class="input-field">
              <i class="fas fa-address-card"></i>
              <input
                type="text"
                name="address"
                placeholder="Address"
                required
              >
            </div>

            <div class="input-field">
              <i class="far fa-id-card"></i>
              <input type="text" placeholder="Employee Number" name="empnum">
            </div>
            <div class="input-field">
              <i class="fa fa-mobile-phone"></i>
              <input
                type="tel"
                name="phone"
                placeholder="Mobile Number"
                pattern="[0-9]{10}"
                required
              >
            </div>
            <input type="submit" name="submit" class="btn"  value="Sign up" />
          </form>
      </div>

    
      <div class="panels-container">

        <div class="buttonconent">
            <h3>Sing in</h3>
            <p>IF already have an Account CLICK HERE</p>
            
            <button class="btn transparent" id="sign-in-btn">
              <a href="login.php">Sign in</a>
            </button>
        </div>

        <div class=" left-panel">
          <div class="content">
            
          </div>
          <img src="img/log in.svg" class="image" alt="" width="55" height="50"/>
        </div>
      </div>
    </div>

    
  </body>
</html>


<?php

if(isset($_POST['submit'])){
    $name = $_POST['namew']; 
    $fname = $_POST['fname']; 
    $date = $_POST['date']; 
    $email = $_POST['email']; 
    $username = $_POST['username']; 
    $password = md5($_POST['password']);
    $gender = $_POST['gender']; 
    $nic = $_POST['nic']; 
    $address = $_POST['address']; 
    $empnum = $_POST['empnum']; 
    $phone = $_POST['phone']; 
    
    $sql = "INSERT INTO employeedetails(Namewithintials,Fullname,DOB,Gender,EmpAddress,EmpNIC,Email,MobileNumber,Username,Password) VALUES(?,?,?,?,?,?,?,?,?,?)";//blind parameters
    $stmt = $conn->prepare($sql);//connection run 
    $stmt->bind_param("ssssssssss",$name,$fname,$date,$gender,$address,$nic,$email,$phone,$username,$password);
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
