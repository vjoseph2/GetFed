
//Removes all content within the room number input field in sign up dialog
function removeRoomNumber() {
    $(".roomnumber").empty();
}

//Listens for user to change select tag
function alertDormChange() {
//first clear room info
    removeRoomNumber();
    var dormSelected = $("#dormlist :selected").val()
    var dormLength = dormSelected.length;
    //console.log(dormLength);
	//Only once, append a room number input box under the dorm selection
    $("#dormlist").one('click', function() {
        $(this).after("<div class='roomnumber'><input class='form-control' required='required' type='text' name='roomnumber' placeholder='Room #'></div>");
    });

}

//Removes all content within the on campus option selection field in sign up dialog
function removeOnCampus() {
	//clears both on-campus selectio and dorm name selection
    $("#dormlist").empty();
    $(".dorm-area").empty();
}

//Removes all content within the off campus option selection field in sign up dialog
function removeAddress() {
    $(".address-area").empty();
}

// Adds all address fields
function createAddress() {
    $("#residence").after("<div class='address-area'><hr>Address:<br><input class='text' placeholder='street' class='form-control street' name='street'><br><input class='text' placeholder='city' class='form-control city' name='city'><br><input class='text' placeholder='state' class='form-control state' name='state'><br><input class='text' placeholder='zip' class='form-control zip' name='zip'></div>");

}


//Listens for user to select the on-campus living options
function alertChange() {
	//clears address field first
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
			
			//generates option tags based on key and key values
            $("#dormlist").append("<option value='" + residences[keys[i]] + "'>" + keys[i] + "</option></select>");

            //debugging to see if house and house value show up in respected value/text areas 
            //console.log("<option value='"+residences[keys[i]]+"'>"+keys[i]+"</option></select>");
        }
        //$("#dormlist").append("<option value='dfd'>Hi</option></select>");
        removeAddress();
    } else if (userSelection == "offcampus") {
		//clears the rest of the form
        removeAddress();
        removeOnCampus();
        createAddress();

    } else if (userSelection == "miscchoice") {
		//clears the rest of the form
        removeAddress();
        removeOnCampus();
        createAddress();
    } else {
		//debugging message
        console.log("something went wrong... are you sure you have the correct selection option?");
    }
 var userSelection = $("#dormlist :selected").val();
 
$(".finalInputPreview").html(userSelection);

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
    if(areaCode.length==3){
			$(".firstThree").focus();
	}
	if(firstThree.length==3){
		$(".lastFour").focus();
	}
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

function editImg(){
	$("#img-modal").modal('show');
}
function logout(){
	window.location="logout.php";
}
function addRowtoRes(){
	$("#addResidence").modal('open');
}