<?php
header('Location: ingredients.php');
session_start();
require('includes/connect.php');
error_reporting(E_ALL ^ E_NOTICE);
$fid= $_SESSION['fid'];
//function getValues(){
	$itemsArray=array();
	$qtysArrray=array();
		for ($i=1; $i<11; $i++){
			
			$ingredients= "ingredient$i";
			$qtys="qty$i";
			$items="item$i";
			$ingredientCommand= "$ingredients = $_POST[$items]";
			$qtyCommand="$qtys = $_POST[$qtys]";	
			${"ingredient".$i}= $_POST[$items];
			if (empty(${"ingredient".$i})){
				return false;
			}else{
				 trim(${"ingredient".$i});
			}
			${"qty".$i}= $_POST[$qtys];
			if (empty(${"qty".$i})){
				return false;
			}else{
				trim(${"qty".$i});
			}
			//echo $i.". ".${"ingredient".$i}.": ".${"qty".$i}."<br>";
			$ingredients=$_POST[$items];
			$qtys=$_POST[$qtys];
			$itemsArray["ingredient".$i] = ${"ingredient".$i};
			$qtysArrray["qty".$i] = ${"qty".$i};
				
				
					${"ingredientInsert".$i}= "INSERT INTO owned_ingredients (fid, name,qty) VALUES ('$fid','${'ingredient'.$i}',
					'${'qty'.$i}')";
					if (mysqli_query($conn, ${"ingredientInsert".$i})) {
						echo "<br>New ingredient recorded successfully";
					} else {
						echo "<br>Error: " . ${"ingredientInsert".$i} . "<br>" . mysqli_error($conn);
					}
			//array_push($itemsAndqtys,${"ingredient".$i});
		}
		//echo $itemsAndqtys;
//	print_r($itemsArray);
	echo"<br>";
//	print_r($qtysArrray);
	//return $itemsAndqtys;
	
	echo"<br>";
		$array3 = array_merge($itemsArray, $qtysArrray/*, $arrayN, $arrayN*/);
		$array4 = $itemsArray + $qtysArrray;
//}
//echo "The new array is:". print_r($array3) ;



/*function checkEmptyOrNot($ingredientNumber, $qtyNumber){

//$itemsAndqtys=array();
	$checkEmpty=isset($ingredientNumber);
	$checkEmpty2= isset($qtyNumber);
	if ($checkEmpty== 1 || $checkEmpty2 == 1 ){
		echo $qtyNumber;
		//echo $ingredientNumber;
		//echo $qtyNumber."<br>";
		// $myarray= array_push($itemsAndqtys,$ingredientNumber,$qtyNumber);
		//print_r($itemsAndqtys);
		//return $itemsAndqtys;
	}else if ($checkEmpty==0 || $checkEmpty2 == 0){
		
		echo "There is no value here<br>";
		//return false;
	}else{
		echo "Something wennt wrong...";
	}
}

*/
/*$ingredient1= $_POST["item1"];
$qty1=  $_POST["qty1"];
$ingredient2=  $_POST["item2"];
$qty2=  $_POST["qty2"];
$ingredient3=  $_POST["item3"];
$qty3=  $_POST["qty3"];
$ingredient4=  $_POST["item4"];
$qty4=  $_POST["qty4"];
$ingredient5=  $_POST["item5"];
$qty5= $_POST["qty5"];
$ingredient6= $_POST["item6"];
$qty6= $_POST["qty6"];
$ingredient7= $_POST["item7"];
$qty7=  $_POST["qty7"];
$ingredient8= $_POST["item8"];
$qty8=  $_POST["qty8"];
$ingredient9= $_POST["item9"];
$qty9=  $_POST["qty9"];
$ingredient10= $_POST["item10"];
$qty10=  $_POST["qty10"];
*/
/*
checkEmptyOrNot($ingredient1, $qty1);
checkEmptyOrNot($ingredient2, $qty2);
checkEmptyOrNot($ingredient3, $qty3);
checkEmptyOrNot($ingredient4, $qty4);
checkEmptyOrNot($ingredient5, $qty5);
checkEmptyOrNot($ingredient6, $qty6);
checkEmptyOrNot($ingredient7, $qty7);
checkEmptyOrNot($ingredient8, $qty8);
checkEmptyOrNot($ingredient9, $qty9);
checkEmptyOrNot($ingredient10, $qty10);*/

//echo $ingredient1." ".$qty1;
	
?>
