<?php
session_start();
require('includes/connect.php');
$fid=$_SESSION['fid'];
?>
	<html>
		<head>
		<script src="js/jquery-2.2.4.min.js"></script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src="jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/jquery.timepicker.js"></script>
		<script type="text/javascript" src="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/lib/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/lib/site.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/jquery.timepicker.css" />
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/lib/bootstrap-datepicker.css" />
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0.custom/jonthornton-jquery-timepicker-e417a53/lib/site.css" />
		<link rel="stylesheet" href="css/fonts.css" type="text/css">
		<link rel="stylesheet" href="jquery-ui-1.12.0.custom/jquery-ui.min.css" type="text/css">
		<link rel="stylesheet" href="jquery-ui-1.12.0.custom/jquery-ui.theme.css" type="text/css">
		<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
		<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-cutlery"></i> GetFed &trade;</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
		<li><a href='home.php'>Home</a></li>
		<li class='active'><a href='profile.php'>Profile & Settings</a></li>
		<li><a href='past_meals.php'>View Past Meals</a></li>
		<li><a href='manage_residences.php'>Manage Residences</a></li>
	</ul>
 <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php" style="display:inline-block"><span class="glyphicon glyphicon-user"></a></span>Welcome,<?php echo " ".$_SESSION['firstname']." "; ?> </li>
       <!-- <li><a class="login" style="display:inline-block"href="logout.php">Not<?php// echo " ".$_SESSION['firstname']; ?> ? Logout</p></li>-->
      </ul>
    </div>
  </div>
</nav>
<script>
		function dynamicMealImg(){
		//	var mealBg= document.getElementById("mealImg").style.backgroundImage;
			var getMealURL= $("input[value='mealLink']").text();
			console.log(getMealURL);
			
			}
		</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$('#basicExample').timepicker();
	$('#basicExample2').timepicker();
	$('#basicExample3').timepicker();
  } );
  </script>
  
<body>

<form class="form" action="meal_plan.php" method="POST">
		<h1> Plan a Meal! </h1>
<div class='row'>
	<div class='col-sm-12'>
		<h4>Step 1 : Pick a Day</h4>
		<input type="text"  class="form-control" name="date" id="datepicker">
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
		<h4>Step 2 : Pick a Time or Time Range</h4>
		<span class='questionTime'>Time or Range?</span><br>
		<div class="timeorrange">
			<input onclick="check(this.value)" type="radio" name="timerange" value="time">Time<br>
			<input onclick="check(this.value)" type="radio" name="timerange" value="range">Range<br>
		</div>
		<div class="time">
			<input id="basicExample" name="time" type="text" class="time ui-timepicker-input" autocomplete="off">
		</div>
		<div class="range">
			<input id="basicExample3" name="time1" type="text" class="time ui-timepicker-input" autocomplete="off">
			to 
			<input id="basicExample2" name="time2" type="text" class="time ui-timepicker-input" autocomplete="off">
		</div>
		<script>
		function check(timerange) {
			if(timerange=="time"){
			$(".timeorrange").hide();
			$(".time").show();
			$(".range").hide();
			$(".questionTime").html("Time");
			console.log("you chose time");
			}else{
			$(".timeorrange").hide();
			$(".time").hide();
			$(".range").show();
			$(".questionTime").html("Range");
			
			console.log("you chose range");
			}
		}
		</script>
		<!--<input class="form-control" type='time'> to <input class="form-control" type='time'>-->
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
		<input class="form-control" name="mealTitle" class='text'><br>
	</div>
	<div class='col-sm-6'>
	<h4>Optional</h4>
		<small>Optional: Add a link to your meal </small>
		<input name="mealLink" class="form-control" type="text" onkeydown="dynamicMealImg()">
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
	<h4>Step 4: Choose Where to Host</h4>
	<?php
	
		$residentialAreas ="SELECT 
								h.hid AS house_id, 
								h.house_address AS house, 
								h.fid AS user_id, 
								f.fname AS first_name, 
								f.lname AS last_name 
							FROM 
								houses h 
							INNER JOIN 
								friends f 
							ON 
								h.fid=f.fid 
							WHERE 
								share_choice='yes'";
		$result = $conn->query($residentialAreas);
		if ($result->num_rows > 0) {
				echo "<select name='hid' class='form-control'>";
			while($row = $result->fetch_assoc()) {
				echo	"<option value=".$row['house_id'].">".$row['house'].": Owned By: ".$row['first_name']."
							 ".$row['last_name']."</option>";
			}
		} else {
			
		} 
		echo "</select>";
	?>
	</div>
</div>
<?php
	//	echo "<input class='form-control btn btn-success' type='submit' value ='Plan the Meal'>";
	?>	
<div class="row">
	<div class="col-sm-12">
		<h4>Step 5: Choose What You Need?</h4>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ingredientModal">Edit Ingredients</button>
	</div>
</div>


<div id="ingredientModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What Ingredients Does it Need?</h4>
      </div>
      <div class="modal-body">
		<ol>
			<li><input type="text" name="ingredient1"></li>
			<li><input type="text" name="ingredient2"></li>
			<li><input type="text" name="ingredient3"></li>
			<li><input type="text" name="ingredient4"></li>
			<li><input type="text" name="ingredient5"></li>
			<li><input type="text" name="ingredient6"></li>
			<li><input type="text" name="ingredient7"></li>
			<li><input type="text" name="ingredient8"></li>
			<li><input type="text" name="ingredient9"></li>
			<li><input type="text" name="ingredient10"></li>
			<li><input type="text" name="ingredient11"></li>
			<li><input type="text" name="ingredient12"></li>
		</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	
<input class='form-control btn btn-success' type='submit' value ='Plan the Meal'>
</form>
</body>
	</html>