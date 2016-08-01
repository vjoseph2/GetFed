<?php
header("Location: manage_residences.php");
require('includes/connect.php');
$fid=$_POST['fid'];
$house= $_POST['house'];

$removeResidence="DELETE FROM houses WHERE fid = '$fid' AND house_address= '$house'";
//SELECT f.user_group AS type ,f.fid, h.house_address ,
//h.share_choice AS public FROM friends f JOIN houses h ON f.fid=h.fid

//$removeResidence="DELETE FROM houses WHERE house_address='$house' AND fid='$fid' OR user_group='admin'";
if (mysqli_query($conn, $removeResidence)) {
    echo "<br>Residence deleted successfully";
} else {
    echo "<br>Error: " . $removeResidence. "<br>" . mysqli_error($conn);
}
?>