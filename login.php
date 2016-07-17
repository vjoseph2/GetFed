<?php
require('includes/connect.php');
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
		$_SESSION['fid']=$row['fid']; 
		
		echo "<br>The logged in user is: ".$_SESSION['user'];
		echo "<br> The logged in First Name is ".$_SESSION['firstname'];
    }

	header('Location: home.php');
	echo "<br>You should be able to login with your account";
} else {
    echo "<br>Sorry, you either typed in an incorrect password or you need to make an account";
} 

?>