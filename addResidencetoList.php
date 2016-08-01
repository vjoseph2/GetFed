<?php
error_reporting(E_ALL ^ E_NOTICE);

header('Location: manage_residences.php');

require('includes/connect.php');

$fid=$_POST['fid'];

$residence=$_POST['dormlist']." ".$_POST['roomnumber']." ".$_POST['street']." ".$_POST['city']." ".$_POST['state']." ".$_POST['zip'];

$public=isset($_POST['publiCheckbox']);

if ($public == "1"){
	$public="yes";
}else if($public == "0"){
	$public="no";
}else{
	echo "something went wrong with the public option...";
}


$newResidence="INSERT INTO houses (fid,	house_address, share_choice) VALUES ('$fid','$residence','$public')";

if (mysqli_query($conn, $newResidence)) {
    echo "<br>New residence created successfully";
} else {
    echo "<br>Error: " . $newResidence. "<br>" . mysqli_error($conn);
}
?>