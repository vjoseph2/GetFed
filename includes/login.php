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
/*
$username=sanitation($_POST['username']);
$password=sanitation($_POST['password']);
*/

$username=$_POST['username'];
$password=$_POST['password'];
#check to see if the user is realpath

echo $username.$password;
/*$login = "SELECT * FROM friends WHERE username='$username' AND password = '$password'";
$result = $conn->query($login);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$_SESSION['user']=$username; 
		echo "The logged in user is: ".$_SESSION['user'];
    }
} else {
    echo "Sorry, you either typed in an incorrect password or you need to make an account";
} */

?>