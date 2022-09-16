<?php
session_start(); 
if(isset($_SESSION['empid'])){
  session_abort(); 
  include("partials/nav.php"); 
}
else{
  include("partials/homenav.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSS/main.css?version=2.3">
  <link rel="stylesheet" href="CSS/contact.css?version=1.5">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script>
    function sendmsg(){
      let fname = document.getElementById("fname"); 
      let lname = document.getElementById("lname"); 
      let msg = document.getElementById("msg"); 

      if(fname.value == "" || lname.value == "" || msg.value == ""){
          document.getElementById("errorbox").innerText = "Empty Fields";
      }
      else{
        document.getElementById("submitbutton").click();
      }
    }
  </script>

</head>
<body>
  <div class="maincontainer">
    <div class="header"><h1>Contact Us</h1><h2 id="errorbox"></h2></div>
    <div class="formmainContainer">
          <div class="formContainer">
            <form action="" method="POST">
                <div class="nameinputCon">
                    <div class="nameCon">
                      <label for="fname" class="inputlabel">First Name</label>
                      <input type="text" name="fname" id="fname" class="formtextInput" placeholder="Enter your First name">
                    </div>
                    <div class="nameCon">
                      <label for="lname" class="inputlabel">Last Name</label>
                      <input type="text" name="lname" id="lname" class="formtextInput" placeholder="Enter your Last name">
                    </div>
                </div>
                <div class="msginputcon">
                <label for="msg" class="inputlabel">Messege</label>
                <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Enter your messege here" class="textareamsg"></textarea>
                </div>
                <div class="buttoncontainer">
                  <a href="#" onclick="sendmsg()"  class="submitBTN">Send</a>
                  <input type="submit" id="submitbutton" hidden name="submit">
                </div>
            </form>
          </div>
        <div class="contactdetailcontainer">
          <div class="dontactdetailcon">
            <div class="innercontactmainelement">
              <div class="contactsubelement">
                <h1>Address</h1>
                <div class="cse02">
                  <i class="fa fa-map-marker"></i>
                  <h2>
                    247/5/E, <br>
                    Vihara Mawatha, <br>
                    Maradana, <br>
                    Colombo 10 <br>
                  </h2>
                </div>
              </div>
              <div class="contactsubelement">
                <h1>Telephone</h1>
                <div class="cse02">
                <i class="fa fa-phone"></i>
                  <h2>+94 11 555 4445 <br>
                      +94 36 554 2255</h2>
                </div>
              </div>
            </div>
            <div class="innercontactmainelement">
              <div class="contactsubelement">
                <h1>Web</h1>
                <div class="cse02">
                  <i class="fa fa-globe"></i>
                  <h2>www.examoplus.com</h2>
                </div>
              </div>
              <div class="contactsubelement">
                <h1>Email</h1>
                <div class="cse02">
                <i class="fa fa-envelope-open"></i>
                  <h2>examoplus.support@gmail.com</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="mapcon">
            <a href="#">
                <img src="img/maplocation.jpeg" alt="" width="100" height="100">
            </a>
          </div>
        </div>
    </div>
  </div>
</body>
</html>

<?php
include("partials/footer.php"); 
?>


<?php
if(isset($_POST['submit'])){
  if(isset($_SESSION['empid'])){
    $userid = $_SESSION['empid']; 
  }
  else{
    $userid = 0; 
  }
  $fname = $_POST['fname']; 
  $lname = $_POST['lname']; 
  $msg = $_POST['msg'];

  $sql = "INSERT INTO contact_msgs(userid,fname,lname,msg) VALUES(?,?,?,?)";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("isss",$userid,$fname,$lname,$msg);
  $stmt->execute();

  if($conn == true){
      ?>
      <script>
          //window.location.replace("login.php");
      </script>
      <?php
  }
}

?>

