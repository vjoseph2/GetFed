<head>
<title> My Ingredients </title>
</head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require("includes/connect.php");
include("header.php");
$fid= $_SESSION['fid'];
echo "<h1>Your Ingredients</h1>";
$get_ingredients = "SELECT * FROM owned_ingredients WHERE fid ='$fid'";
//$get_ingredients = "SELECT * FROM owned_ingredients WHERE fid =''";
$result = $conn->query($get_ingredients);

if ($result->num_rows > 0) {
	echo "<table class='table table-striped table-hover'>";
	echo "<thead>
			<tr>
			  <th>Ingredient ID</th>
			  <th>Name of Ingredient</th>
			  <th>Quantity of Ingredient</th>
			  <th>Edit Items</th>
			  <th>Delete Items</th>
			</tr>
		  </thead>";
  
    while($row = $result->fetch_assoc()) {
		$iid=$row['iid'];
	/*	echo "<tr class='row $iid'><td>".$row['iid']."</td><td>".$row['name']."</td><td>".$row['qty']."</td>";
	//	echo "<input type='hidden' value='".$row['iid']."'>";
		echo "<td><a onclick='updateIngredient()' href='#'><span style='color:#18BC9C' class='glyphicon glyphicon-pencil'></span></a></td>";
		echo "<td><a class='deleteIngredient' href='#'><span style='color:#E74C3C'  class='glyphicon glyphicon-remove-sign'></span></a></td></tr>";
    */
	echo "<tr>";
	echo "<td>".$row['iid']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['qty']."</td>";
	
	//echo "<td><form action='updateIngredients' method='POST'><a onclick='updateIngredient()' href='#'><span style='color:#18BC9C' class='glyphicon glyphicon-pencil'><input type='hidden' name='editIngredient'value='".$iid."></span></a></form></td>";
	//echo "<td><form action='deleteIngredients' method='POST'><a class='deleteIngredient' href='#'><span style='color:#E74C3C'  class='glyphicon glyphicon-remove-sign'></span></a><form></td>";
	
	echo "<td><a onclick='updateIngredient()' href='#'><span style='color:#18BC9C' class='glyphicon glyphicon-pencil'></span></a></td>";
	echo "<td><input type='hidden' name='getDeleteId' value='".$iid."><a class='deleteIngredient' href='#'><span style='color:#E74C3C'  class='glyphicon glyphicon-remove-sign'></span></a></td>";
	echo "</tr>";
	}
	echo "</table>";
}else {
	?>
<div class="row tenalert">
	<div class="col-sm-12">
		<div class="alert alert-danger nomorethanten fade in">
		<strong> Sorry! </strong> You can't add more than 10 ingredients at a time.
		<a href="#" class="remove-ten-alert" data-dismiss="alert"><span class="glyphicon glyphicon-remove-sign"></span></a>
		</div>
	</div>
</div>
<div class="row maincart2">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><center><span class="glyphicon glyphicon-shopping-cart maincart"></span>

		<br> Looks like you don't have any ingredients yet! Need to go <a href="http://www.shoprite.com/srfh_delivery/">shopping?</a><br>
		<button type="button" onclick= "addItems()" class="btn btn-success addItems">
			<span class="glyphicon glyphicon-plus"></span>
			<br> Add Items
		</button>
<center>
</div>
		<div class="col-sm-4"></div>
</div>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 addrow" >
	<button class='btn btn-success'>Add an Item</button>
	<div class="col-sm-4"></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
	<form class="form" action="submitIngredients.php" method="POST">
		<table class="table table-striped table-hover ingredientstable">
		
</table>
	</form>
		
	</div>
</div>

<?php } ?>
<div class="row">
<hr>
	<div class="col-sm-12">
		<h3>Add More Ingredients</h3>
	<form class="form" action="submitIngredients.php" method="POST">
		<table class="table table-striped table-hover ingredientstable2">
		
</table>
	
		
	</div>
</div>
<div class='btn-container'>
	<button type='button' onclick='addrow2()' class='btn btn-success'>Add more Ingredients</button>
	<input class='btn btn-primary' value='Insert Ingredient' type='submit'>
	<button type='button' onclick='deleterow2()' class='btn btn-danger btn-remove'>Remove an Ingredient</button></form>
</div>