<?php
require('includes/connect.php');
header('Location: home.php');
#login script

#check values of user and pass after sanitation 
function sanitation($postVal){
	$rawinfo= $postVal;
	$removeSpecial = htmlspecialchars($rawinfo);
	$finalForm = escapeshellcmd($removeSpecial);
	return $finalForm;
}

$username=sanitation($_POST['username']);
$password=sanitation($_POST['password']);

#check to see if the user is realpath

echo "The username was: ".$username."<br> The password was :".$password;
$login = "SELECT * FROM friends WHERE username='$username' AND password = '$password'";
$result = $conn->query($login);
if ($result->num_rows > 0) {
    // output data of each row
		session_start();
    while($row = $result->fetch_assoc()) {
		$_SESSION['user']=$username; 
		$_SESSION['firstname']=$row['fname'];
		$_SESSION['lastname']=$row['lname']; 
		$_SESSION['fid']=$row['fid'];  
		$_SESSION['prefmethod']=$row['preferred_contact']; 
		$_SESSION['profImage']=$row['profile_img']; 
		
		echo "<br>The logged in user is: ".$_SESSION['user'];
		echo "<br> The logged in First Name is ".$_SESSION['firstname'];
		echo "<br> The logged in Last Name is ".$_SESSION['lastname'];
		echo "<br> The logged in preferred image is ".$_SESSION['profImage'];
		echo "<br> The logged in preferred contact method is ".$_SESSION['prefmethod'];
    }
	echo "<br>You should be able to login with your account";
} else {
    echo "<br>Sorry, you either typed in an incorrect password or you need to make an account";
} 

?>