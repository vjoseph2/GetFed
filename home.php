<head>
<title> Home Page </title>
</head>
<?php
require ('includes/connect.php');
include('header.php');

?>
<script>
function randomImg(){
	var imgsources= [
					"img/dinner-for-two-amore-pizza.jpg",
					"img/Dinner-Party-Hors-dOeuvres.jpg",
					"img/easy_sunday_roast.jpg",
					"img/food-restaurant-hand-dinner.jpg",
					"img/friedpeppers.jpg",
					"img/garden-veggies.jpg",
					"img/IMG_0288.png",
					"img/meat-dinner.jpg",
					"img/outsideeating.jpg",
					"img/peopleeating.jpg",
					"img/photo-1416453072034-c8dbfa2856b5.jpg",
					"img/photo-1464207687429-7505649dae38.jpg",
					"img/pinchitos.jpg",
					"img/pizza.jpg",
					"img/shrimpies.jpg",
					"img/shrimpstew.jpg",
					"img/tandorichicken.jpg",
					"img/barbecue.jpg",
					"img/chicken.jpg",
					"img/dinner.jpg"];
	var imgAmount=imgsources.length;
	var pickAnimageAnyimage=Math.floor(Math.random() * imgAmount);
	console.log(imgsources[pickAnimageAnyimage]);
	var bgImage= document.getElementById("dynamicbackground").style.backgroundImage= "url('" + imgsources[pickAnimageAnyimage]  + "')";
		console.log(bgImage);
}
</script>

<script>
function goIngredients(){ 
	window.location.replace("ingredients.php");
};
</script>
	<body onload="randomImg()">
	<div class="row">
		<div class="col-sm-12 dynamic-background2" id="dynamicbackground">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4 jumbotron move-down">
				<center>
					<h1>welcome back, <?php echo " ".$_SESSION['firstname']; ?></h1><p class="text-muted">Please Choose from the Options Below.</p>
					<div class="btn-group">
						<button onclick ="goIngredients()" class="btn btn-info ingredients" data-toggle="tooltip" data-placement="top" title="Edit the ingredients you have" data-original-title="Tooltip on top"><span class="glyphicon glyphicon-pencil"></span><br>Edit Your Ingredients</button>
						<button class="btn btn-success plan"><span class="glyphicon glyphicon-ice-lolly-tasted"></span><br>Plan A Meal</button>
						<button class="btn btn-danger request"><span class="glyphicon glyphicon-question-sign"></span><br>Request A Meal</button>
					</div>
				</center>
					<div class="col-sm-4">
					</div>
				</div>
			</div>
		</div>
	</div>