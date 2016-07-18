<?php
require("includes/connect.php");
include("header.php");
?>
<form class="form">
		<h1> Plan a Meal! </h1>
<div class='row'>
	<div class='col-sm-12'>
		<h4>Step 1 : Pick a Day</h4>
		<div class='calendar'>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
		<h4>Step 2 : Pick a Time or Time Range</h4>
		<input class="form-control" type='time'> to <input class="form-control" type='time'>
	</div>
</div>

<div class='row'>
	<div class='col-sm-12' id='mealimage'>
	<!--img/chicken.jpg-->
		<center> <span class='mealTitle'>Title Goes Here</span> </center>
	</div>
</div>

<div class='row'>
	<div class='col-sm-6'>
	<h4>Step 3 : Pick a Meal</h4>
	<small>Title of Meal </small>
		<input class="form-control" class='text'><br>
	</div>
	<div class='col-sm-6'>
	<h4>Optional</h4>
		<small>Optional: Add a link to your meal </small>
		<input name='mealLink' class="form-control" type='text' onkeydown="dynamicMealImg()">
	</div>
</div>
<input class="form-control btn btn-success" type="submit" value ="Plan the Meal">
</form>







