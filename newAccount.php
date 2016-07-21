<?php

error_reporting(E_ALL ^ E_NOTICE);
require('includes/connect.php');
function sanitation($postVal){
	$rawinfo= $postVal;
	$removeSpecial = htmlspecialchars($rawinfo);
	$finalForm = escapeshellcmd($removeSpecial);
	return $finalForm;
}
$fname= sanitation($_POST['fname']);
$lname= sanitation($_POST['lname']);
$username= sanitation($_POST['username']);
$password= sanitation($_POST['password']);
$residence=$_POST['dormlist']." ".$_POST['roomnumber']." ".$_POST['street']." ".$_POST['city']." ".$_POST['state']." ".$_POST['zip'];
$cellNum= $_POST['cellNumber'];


echo "First name: ".$fname." Last name: ".$lname." Phone number: ".$cellNum." Residence Selected was: ".$residence;
$newUser= "INSERT INTO friends (fname,lname,cellnumber,residence,username,password) VALUES ('$fname', '$lname', '$cellNum','$residence','$username','$password')";

if (mysqli_query($conn, $newUser)) {
    echo "<br>New record created successfully";
} else {
    echo "<br>Error: " . $newUser . "<br>" . mysqli_error($conn);
}

$whatIfWeTookThisId = "SELECT fid FROM friends WHERE username='$username' AND password = '$password'";
$result = $conn->query($whatIfWeTookThisId);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$fid=$row['fid'];
		echo $fid;
    }
} else {
	"something went wrong...";
} 

$andPutItSomewhereElse= "INSERT INTO houses (fid,house_address) VALUES('$fid','$residence')";
if (mysqli_query($conn, $andPutItSomewhereElse)) {
    echo "<br>New record created successfully";
} else {
    echo "<br>Error: " . $andPutItSomewhereElse. "<br>" . mysqli_error($conn);
}
?>