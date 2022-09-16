<?php
include 'Calendar.php';
include("partials/nav.php"); 

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "onlineexaminationsystem";

$conn = new mysqli($servername, $username, $password, $dbname,3306);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Examname, Startingdate FROM examdetails";
$result = $conn->query($sql);

$currentDate = date('y-m-d');
// // $calendar = new Calendar('2021-12');
$calendar = new Calendar($currentDate);

while($row = $result->fetch_assoc()) {
    $calendar->add_event($row["Examname"],$row["Startingdate"],1,'red');
      }
   
$conn->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<link href="CSS/calendar.css?version=2" rel="stylesheet" type="text/css">


	</head>
	<body>

	    <nav class="navtop">
	    	<div>
	    		<h1>Event Calendar</h1>
	    	</div>
	    </nav>
		<div class="content home">
           <?=$calendar?>
		</div>
    <?php include("partials/footer.php"); ?>
	</body>
</html>