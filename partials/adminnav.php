
<?php
include("Constant/config.php");
$EmpID = $_SESSION['empid']; 

//user details

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="CSS/index.css?version=2.3">
<link rel="stylesheet" href="CSS/main.css?version=2.3">    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>

<div class="topfixedelements">
        <div class="topheader">
            <div class="thnamecon">EXAM O PLUS</div>
            <div class="thlogocon">
            <a href="userview.php">
                <img src="<?php echo $profilepic;?>" alt="" width="100" height="100">
            </a>

            </div>
        </div>


        
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">EXAM O PLUS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addexam.php">Create Exam</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewexam.php">View Exam</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manageemployee.php">Manage Employees</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


    </div>  
</body>
</html>