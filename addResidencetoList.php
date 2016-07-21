<?php
error_reporting(E_ALL ^ E_NOTICE);

header('Location: manage_residences.php');

require('includes/connect.php');

$fid=$_POST['fid'];

$residence=$_POST['dormlist']." ".$_POST['roomnumber']." ".$_POST['street']." ".$_POST['city']." ".$_POST['state']." ".$_POST['zip'];

$newResidence="INSERT INTO houses (fid,	house_address) VALUES ('$fid','$residence')";

if (mysqli_query($conn, $newResidence)) {
    echo "<br>New residence created successfully";
} else {
    echo "<br>Error: " . $newResidence. "<br>" . mysqli_error($conn);
}
?>