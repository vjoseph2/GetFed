<?php
require('includes/connect.php');
header('Location: profile.php');
$newImage=$_POST['chooseImg'];
$fid=$_POST['fid'];
echo "New Image is now: ". $newImage."<br>FID is: ".$fid;
$updateImg="UPDATE friends SET profile_img ='$newImage' WHERE fid='$fid'";
if (mysqli_query($conn, $updateImg)) {
    echo "<br>Image Updated Successfully";
} else {
    echo "<br>Error: " . $updateImg . "<br>" . mysqli_error($conn);
}
echo "<br>I'm deleteing the session var now...<br>";


$grabImage = "SELECT * FROM friends WHERE fid = '$fid'";
$result = $conn->query($grabImage);
if ($result->num_rows > 0) {
    // output data of each row
		session_start();
    while($row = $result->fetch_assoc()) {
		$_SESSION['profImage']=$row['profile_img']; 
		echo "<br> The logged in preferred image is ".$_SESSION['profImage'];
    }
} else {
    echo "<br>Sorry, an error has occured.";
} 
?>