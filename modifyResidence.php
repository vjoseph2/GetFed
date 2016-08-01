<?php
require('includes/connect.php');
error_reporting(E_ALL ^ E_NOTICE);

header('Location: manage_residences.php');
$newName=$_POST['newName'];
$hid=$_POST['hid'];
$fid=$_POST['fid'];
$public=isset($_POST['publiCheckbox']);

if ($public == "1"){
	$public="yes";
}else if($public == "0"){
	$public="no";
}else{
	echo "something went wrong with the public option...";
}

echo "<br> New Dorm Name is: ".$newName;
echo "<br> New Public Setting is: ".$public;
echo "<br> The HID of that house was: ".$hid."<br>Done by: ".$fid;

$updateResidence= "UPDATE houses SET house_address='$newName', share_choice='$public' WHERE hid='$hid'";
if (mysqli_query($conn, $updateResidence)) {
    echo "<br>Residence updated successfully";
} else {
    echo "<br>Error: " . $updateResidence. "<br>" . mysqli_error($conn);
}

?>