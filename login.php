<?php
include("Constant/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="CSS/Loginstyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin">
          <form action="#" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                id="psw"
                placeholder="Password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required
                name="password"
              />
            </div>
           <div>
           <a href="forgotpassword.php">Forgot Password</a>
           </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Register</h3>
            <p>New to site Click HERE</p>
            <button class="btn transparent" id="sign-up-btn">
              <a href="register.php">Sign up</a>
            </button>
          </div>
          <img
            src="img/Signin.svg"
            class="image"
            alt=""
            width="55"
            height="50"
          />
        </div>
      </div>
    </div>
    </script>
  </body>
</html>

<?php

if(isset($_POST['submit'])){ 
    
    $password = md5($_POST['password']); 
    $username = $_POST['username'];

    $stmt = $conn->prepare( "SELECT EmpID,Fullname,usertype FROM employeedetails WHERE (Username=? && Password=?)");
        $stmt->bind_param('ss',$username,$password);
        $stmt->execute();
        $stmt->bind_result($id,$name,$usertype);
        $rs= $stmt->fetch ();
        $stmt->close();
        if (!$rs) {//if ther is nota user like that
        echo "<script>alert('Invalid Details. Please try again.')</script>";
        } 
        else {// session 3 ta add karala tiyenne user wa
        $_SESSION['fname']=$name;
        $_SESSION['empid']=$id;
        $_SESSION['usertype']=$usertype;
        ?>
        
        <script>
            window.location.replace("index.php");
        </script>
        
        <?php
        }
    }
 
?>