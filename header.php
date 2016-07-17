<?php
session_start();
?>
<head>
		<script src="js/jquery-2.2.4.min.js"></script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<link rel="stylesheet" href="css/fonts.css" type="text/css">
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
<?php
function makeCurrentPage(){
	
$pagename= basename($_SERVER['PHP_SELF']);
	if ($pagename == "profile.php"){
		echo "  <li><a href='home.php'>Home</a></li>
				<li class='active'><a href='profile.php'>Profile & Settings</a></li>
				<li><a href='past_meals.php'>View Past Meals</a></li>
				<li><a href='manage_residences.php'>Manage Residences</a></li>";
	}else if($pagename == "past_meals.php"){
		echo "  <li><a href='home.php'>Home</a></li>
				<li><a href='profile.php'>Profile & Settings</a></li>
				<li class='active'><a href='past_meals.php'>View Past Meals</a></li>
				<li><a href='manage_residences.php'>Manage Residences</a></li>";
	}else if($pagename == "past_meals.php"){
		echo "  <li><a href='home.php'>Home</a></li>
				<li><a href='profile.php'>Profile & Settings</a></li>
				<li><a href='past_meals.php'>View Past Meals</a></li>
				<li class='active'><a href='manage_residences.php'>Manage Residences</a></li>";
	}else if($pagename == "home.php"){
		echo "  <li class='active'><a href='home.php'>Home</a></li>
				<li><a href='profile.php'>Profile & Settings</a></li>
				<li><a href='past_meals.php'>View Past Meals</a></li>
				<li><a href='manage_residences.php'>Manage Residences</a></li>";
	}else if($pagename == "ingredients.php"){
		echo "  <li class='active'><a href='home.php'>Home</a></li>
				<li><a href='profile.php'>Profile & Settings</a></li>
				<li><a href='past_meals.php'>View Past Meals</a></li>
				<li><a href='manage_residences.php'>Manage Residences</a></li>";
	}
	else{
		echo "There was an error in determining your page. Try reloading or contacting the system administrator";
	}
}
makeCurrentPage();
        
?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php" style="display:inline-block"><span class="glyphicon glyphicon-user"></a></span>Welcome,<?php echo " ".$_SESSION['firstname']." "; ?> </li>
       <!-- <li><a class="login" style="display:inline-block"href="logout.php">Not<?php// echo " ".$_SESSION['firstname']; ?> ? Logout</p></li>-->
      </ul>
    </div>
  </div>
</nav>