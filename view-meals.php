<?php
require('includes/connect.php');
include('header.php');
?>
<h1>Most Recent Meal Postings</h1>
<?php
//grabs all meal realated info : location of meal, meal name, host name, time and date
$viewMeals = "SELECT 
					m.mid, m.title AS title, m.ingreq AS ingredients, 
					ma.mid, ma.hid, ma.fid_own, ma.tom AS timedate, 
					h.hid, h.house_address AS house, f.fname AS first, f.lname AS last
			  FROM meals m 
			  JOIN meal_apts ma 
			  ON m.mid=ma.mid 
			  JOIN houses h 
			  ON ma.hid=h.hid 
			  JOIN friends f 
			  ON h.fid=f.fid
			ORDER BY timedate DESC;";
$result = $conn->query($viewMeals);
if ($result->num_rows > 0) {
//produces place settings like divs for each meal
    while($row = $result->fetch_assoc()) {
		echo "<form action='join-meal.php' method='GET'>";
		echo "<div class='place-setting'>
			<img class='fork utensils' src='img/icons/fork.svg'>
				<img class='main-course' 
				data-toggle='popover' 
				data-placement='bottom'
			data-trigger='hover' title='".$row['title']."' 
			data-content='
			<table class="."table".">
			<tr><td><i>Ocurring on:</td><td> ".$row['timedate']."</i></td></tr>
			<tr><th>Who&lsquo;s Cooking:</th><td>".$row['first']." ".$row['last']."</td>
					<tr><th>Who&lsquo;s Hosting:</th><td>".$row['house']."</td>
					<tr><th>What You Can Bring:</th><td>".$row['ingredients']."</td>
					</tr></table><i>ID of Meal:".$row['mid']."</i>'
				src='img/Main-Proper-dinner.jpg'>
				<input type='hidden' name='mid' value=".$row['mid'].">
				<input type='hidden' name='fidJoin' value=".$row['mid'].">
			<img class='knife utensils' src='img/icons/knife.svg'>
			<div class='place-setting-label'>".$row['title']."</div>
		</div>";
		echo "</div>";
		echo "<input type='hidden' name='mid'>";
		echo "<input type='hidden' name='fid'>";
		echo "</form>";
	
    }
} else {
} 
?>