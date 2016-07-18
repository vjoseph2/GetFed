<?php
require('includes/connect.php');
$newImage=$_POST['nimg'];
$fid=$_POST['fid'];
$updateImg="UPDATE friends SET profile_img ='$newImage' WHERE fid='$fid'";
if (mysqli_query($conn, $updateImg)) {
    echo "<br>Image Updated Successfully";
} else {
    echo "<br>Error: " . $updateImg . "<br>" . mysqli_error($conn);
}
?>