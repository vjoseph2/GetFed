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
$residence=$_POST['dormlist']." ".$_POST['roomnumber']." ".$_POST['street']." ".$_POST['city']." ".$_POST['state']." ".$_POST['zip'];
$cellNum= $_POST['cellNumber'];


echo "First name: ".$fname." Last name: ".$lname." Phone number: ".$cellNum." Residence Selected was: ".$residence;
$newUser= "INSERT INTO friends (fname,lname,cellnumber,residence) VALUES ('$fname', '$lname', '$cellNum','$residence')";

if (mysqli_query($conn, $newUser)) {
    echo "<br>New record created successfully";
} else {
    echo "<br>Error: " . $newUser . "<br>" . mysqli_error($conn);
}


?>