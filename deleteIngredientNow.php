<?php
require('includes/connect.php');
$iid=$_POST['getDeleteId'];
echo $iid;
$deleteIngredient= "DELETE FROM owned_ingredients WHERE iid= '$iid'";
if (mysqli_query($conn, $deleteIngredient)) {
    echo "<br>Ingredient has been deleted successfully";
} else {
    echo "<br>Error: " . $deleteIngredient . "<br>" . mysqli_error($conn);
}
?>