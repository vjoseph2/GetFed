//$(document).ready(function(){
/*function openOption(){
	//var checkContents = document.getElementsByTagName("filler-box");
	//var contentHTML =  checkContents.innerHTML;
	//console.log(contentHTML);
	var btn = document.getElementsByTagName("meal");
	window.location="meal.php";
	
}*/
//randomImg();
function removeRoomNumber() {
    $(".roomnumber").empty();
}

function alertDormChange() {
    removeRoomNumber();
    var dormSelected = $("#dormlist :selected").val()
    var dormLength = dormSelected.length;
    //console.log(dormLength);	
    $("#dormlist").one('click', function() {
        $(this).after("<div class='roomnumber'><input class='form-control' required='required' type='text' name='roomnumber' placeholder='Room #'></div>");
    });

}

function removeOnCampus() {
    $("#dormlist").empty();
    $(".dorm-area").empty();
}

function removeAddress() {
    $(".address-area").empty();
}

function createAddress() {
    $("#residence").after("<div class='address-area'><hr>Address:<br><input class='text' placeholder='street' class='form-control street' name='street'><br><input class='text' placeholder='city' class='form-control city' name='city'><br><input class='text' placeholder='state' class='form-control state' name='state'><br><input class='text' placeholder='zip' class='form-control zip' name='zip'></div>");

}



function alertChange() {
    removeOnCampus();
    var userSelection = $("#residence :selected").val();
    console.log(userSelection);
    // associative array of houses, stores both house name and option value
    var residences = {
            "Select a dorm": "",
            "Leo Hall": "leohall",
            "Champagnat Hall": "champagnathall",
            "Marian Hall": "marianhall",
            "Sheahan Hall": "sheahanhall",
            "Midrise Hall": "midrisehall",
            "Foy Townhouse": "foytownhouse",
            "Uppernew Townhouse": "uppernewtownhouse",
            "Lowernew Townhouse": "lowernewtownhouse",
            "Lower-West Cedar Townhouse": "lowerwestcedartownhouse",
            "Upper-West Cedar Townhouse": "upperwestcedartownhouse",
            "North-End Housing Complex": "northendhousingcomplex",
            "Upper Fulton Townhouses": "upperfultontownhouses",
            "Lower Fulton Townhouses": "lowerfultontownhouses",
            "Middle Fulton Townhouses": "middlefultontownhouses",
            "Talmadge Court": "talmadgecourt"
        }
        //debug test print
        //console.log(residences);

    //checks to see if the user selects 'on campus' residency to display dynamic options
    if (userSelection == "oncampus") {



        //Creates a select tag with options of on-campus housing
        $("#residence").after("<div class='dorm-area'><br>Dormitory:<select class='form-control' name='dormlist' onchange='alertDormChange()' id='dormlist'></div>");
        //makes an indexed array of associative array
        var keys = Object.keys(residences);
        var i = 0;
        //grabs index and associative array to make option tags
        for (i = 0; i < 14; i++) {
            //debugging to see if house and house value show up independently 
            //console.log("The house is now "+keys[i]);
            //console.log("But the house option value is now "+residences[keys[i]]);

            $("#dormlist").append("<option value='" + residences[keys[i]] + "'>" + keys[i] + "</option></select>");

            //debugging to see if house and house value show up in respected value/text areas 
            //console.log("<option value='"+residences[keys[i]]+"'>"+keys[i]+"</option></select>");
        }
        //$("#dormlist").append("<option value='dfd'>Hi</option></select>");
        removeAddress();
    } else if (userSelection == "offcampus") {
        removeAddress();
        removeOnCampus();
        createAddress();

    } else if (userSelection == "miscchoice") {
        removeAddress();
        removeOnCampus();
        createAddress();
    } else {
        console.log("something went wrong... are you sure you have the correct selection option?");
    }


}

function submitForm() {
    console.log("can you see me");
    $(".newaccount").submit();
};

function clearPhone() {
    $(".fullphone").remove();
};

function formatNumbers() {
    clearPhone();
    var areaCode = $(".areaCode").val();
    var firstThree = $(".firstThree").val();
    var lastFour = $(".lastFour").val();
    //console.log("("+areaCode+")"+firstThree+"-"+lastFour);
    var completeNumber = "(" + areaCode + ")" + "-" + firstThree + "-" + lastFour;
    $(".personal").after("<div class='fullphone'> <input type='hidden' name='cellNumber' value='" + completeNumber + "'> </div>");
    //console.log(completeNumber);
}

function submitLogin(){
	 $(".loginAccount").submit();
	 /*var username = $("input[value='username']").val();
	 var password = $("input[value='password']").val();
	 var dataString= 'username=' + username + '&password='+ password;
	 console.log("hi");
		$.ajax({
			type: "POST",
			url: "login.php",
			data: dataString,
			cache: false,
			success: function(result){
				alert('congratz, you logged in');
			}
		});*/
}
function addItems(){
	$(".maincart2").fadeOut("slow");
	
	$(".ingredientstable").fadeIn("slow").append("<thead><tr><th>#</th><th>Name of Ingredient</th><th>Quantity of Ingredient</th></tr></thead>");
	$(".ingredientstable").after("<div class='btn-container'><button type='button' onclick='addrow()' class='btn btn-success'>Add an Ingredient</button><input class='btn btn-primary' value='Insert Ingredient' type='submit'><button type='button' onclick='deleterow()' class='btn btn-danger'>Remove an Ingredient</button></div>");
//$(".table").append("<tr><td><input name='item1' type='text'></td><td><input type='text' name='qty'></td></tr>");
//$("button").remove();
//$("body").append("<tr><td><input name='item1' type='text'></td><td><input type='text' name='qty'></td></tr>");
addrow();
}
	var c=0;
function addrow(){
	if ( c <10 ){ 
	c++;
	console.log(c);
	//$(".addrow").show();
	$(".table").append("<tr class='ingredient"+c+"'><td>"+c+"</td><td><input name='item"+c+"' type='text'></td><td><input type='text' name='qty"+c+"'></td></tr>");
}
	else{
		$(".tenalert").toggle();
		console.log("Sorry, you cannot add more than "+c+" at a time ");
	}
}
function deleterow(){
	if (c == 0){
		$(".ingredientstable").empty("slow");
		$(".maincart2").fadeIn("slow");
		$(".btn-container").empty();
	}else{
		$(".ingredient"+c).remove();
	c--;
	console.log(c);
		
	}
}

function addrow2(){
	if ( c <10 ){ 
	c++;
	console.log(c);
	//$(".addrow").show();
	$(".ingredientstable2").append("<tr class='ingredient"+c+"'><td>"+c+"</td><td><input name='item"+c+"' type='text'></td><td><input type='text' name='qty"+c+"'></td></tr>");
}
	else{
		$(".tenalert").toggle();
		console.log("Sorry, you cannot add more than "+c+" at a time ");
	}
}
function deleterow2(){
	if (c == 0){
		$(".ingredientstable2").empty("slow");
		$(".maincart2").fadeIn("slow");
		$(".btn-container").empty();
	}else{
		$(".ingredient"+c).remove();
	c--;
	console.log(c);
		
	}
}
function updateIngredient(){
	var getSpecificIngredient=$(this).find(".updateId").text();
	console.log(getSpecificIngredient);
}
function dynamicMealImg(){
//	var mealBg= document.getElementById("mealImg").style.backgroundImage;
	var getMealURL= $("input[value='mealLink']").length;
	console.log(getMealURL);
	
	}
function editImg(){
	$("#img-modal").modal('show');
}
//});