<?php
session_start();
require('includes/connect.php');
$mealLink= $_POST['mealLink'];
$mealTitle=$_POST['mealTitle'];
$time = date('H:i:s' , strtotime($_POST['time']) );
$date = date('Y-m-d',strtotime($_POST['date']));
$hid=$_POST['hid'];
$fid= $_SESSION['fid'];
$dateANDtime= $date." ".$time;
$ingredientCycle=array();
echo "Meal: $mealTitle <br>";
echo "Meal Owner: $fid <br>";
echo "Meal Link: $mealLink <br>";
echo "House : $hid <br>";
echo "DOM: $dateANDtime <br>";
//$ingredient1=$_POST['ingredient1'];
for ($i=1; $i < 13 ; $i++){
	$ingredient="ingredient$i";
	//$ingredient=$_POST[$ingredient];
	${"ingredient".$i}=$_POST["$ingredient"];
	if (empty(${"ingredient".$i})){
		
	}else{
	echo ${"ingredient".$i}."<br>";
	array_push($ingredientCycle,${"ingredient".$i});
	}
}
//https://regex101.com/r/dB5nU5/2
$brokenUp= implode("; ", $ingredientCycle);
$insertMeal="INSERT INTO meals (title, ingreq) VALUES ('$mealTitle','$brokenUp')";

if (mysqli_query($conn, $insertMeal)) {
    echo "Record has been successfully inserted into meals.";
} else {
    echo "Error: " . $insertMeal . "<br>" . mysqli_error($conn);
}

$mid = mysqli_insert_id($conn);

$insertMealApt="INSERT INTO meal_apts (fid_own,tom, mid, hid) VALUES('$fid','$dateANDtime','$mid','$hid')";
if (mysqli_query($conn, $insertMealApt)) {
    echo "Record has been successfully inserted into meals.";
} else {
    echo "Error: " . $insertMealApt . "<br>" . mysqli_error($conn);
}

?>
