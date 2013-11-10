<?php
//checking which radio buttons are selected when adding business hours
$days = array();
if (isset($_POST['sunday']))
    $days[] = $_POST['sunday'];
if (isset($_POST['moday']))
    $days[] = $_POST['monday'];
if (isset($_POST['tuesday']))
    $days[] = $_POST['tuesday'];
if (isset($_POST['wednesday']))
    $days[] = $_POST['wednesday'];
if (isset($_POST['thursday']))
    $days[] = $_POST['thursday'];
if (isset($_POST['friday']))
    $days[] = $_POST['friday'];
if (isset($_POST['saturday']))
    $days[] = $_POST['saturday'];
//implodes the array into a string to be used in an insert statement
$dayString = implode(', ', $days);   
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	
	<script>
	function registerUser()
	{
		//this entire function is error checking, if no errors are found it submits the register form in the else statement. It will need a primary key from the database
		var email=document.forms["register"]["email"].value;
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");
		var uname=document.forms["register"]["username"].value;
		var password=document.forms["register"]["password"].value;
		var businessname=document.forms["register"]["business-name"].value;
		var address=document.forms["register"]["address"].value;
		var venue=document.forms["register"]["venue"].value;
			if (uname==null || uname=="" )
			{
				alert("Please enter a username");
				document.getElementById('username').style.color="black";
				return false;
			}
			else if(password==null || password==""){
				alert("Please provide a password");
				return false;
			}
			else if(venue==null || venue==""){
				alert("Please provide a venue type");
				return false;
			}
			else if(businessname==null || businessname==""){
				alert("Please provide a business name");
				return false;
			}
			else if(address==null || address==""){
				alert("Please provide your business address");
				return false;
			}
			else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
			  {
				  alert("That is not a valid E-mail address");
				  return false;
			  }
			else{ 
			//for the initial insert I don't think you will need a primary key. But once we get an edit button implemented once they are registered, it will need to be passed for the select statement
			document.forms['register'].elements['pk'].value = 1;
			document.forms['register'].submit();
			}
	}
	//alert box that states the hours, probably not needed. Was just cfhecking to make sure they were proper values
	function addHours()
	{
		var open=document.forms["register"]["open"].value;
		var close=document.forms["register"]["close"].value;
		alert(open +" to "+ close);
	}

	</script>
</head>

<body>
<div id="wrapper-register">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<div id="input" >
	<form name="register" class="register-form" action=""<?= $_SERVER['PHP_SELF'] ?>"" method="post">
			<input type="hidden" name="pk" />
			<input type="hidden" name="action" value="register" />
			<div class="header">
				<h1>I'm Bored</h1>
				<span class="header">Please fill out the following form. Note that required fields are marked with *.</span><hr>

			</div>
			<div class="credentials">
				<span class="header">Personal information</span><hr>
				Username:<span class="space"></span><input  id="username" type="text" name="username"placeholder="*Username" class= "box1 required"><span class="tab"></span>
				Password:<span class="space"></span><input  type="password" name="password" placeholder="*Password" class="box1 required" ><br>
			</div>
			<div class="credentials">
				Email-address:<span class="space"></span><input  type="text" name="email" placeholder="*Email-adress" class="box1 required" ><span class="tab">
				Type of Venue: <select class="box1" name="venue">
					<option value=""></option>
					<option value="entertainment">Entertainment</option>
  					<option value="restaurant">Restaurant</option>
 					<option value="bar">Bar</option>
				</select>
			</div>
			
			<div class="credentials">
				<span class="header">Busniness information</span><hr>
				Business Name:<span class="space"></span><input  type="text" name="business-name" placeholder="*Business" class= "box1 required" ><span class="tab">
				Address:<span class="space"></span><input  type="text" name="address" placeholder="*Address" class="box1 required" >
			</div>
			<div class="credentials">
				Phone Number:<span class="space"></span><input  type="text" name="phone_number"placeholder="Phone Number" class= "box1" /><span class="tab"></span>
				Website:<span class="space"></span><input  type="text" name="website" placeholder="Website" class= "box1" /><span class="tab"></span>
			</div>
			
			<div class="credentials">
			<span class="header">Hours</span><hr>
			<div class="btn-group" name="days" data-toggle="buttons" >
			  <label class="btn btn-primary styler">
				<input name="sunday" type="checkbox" value="Sunday"> Su
			  </label>
			  <label class="btn btn-primary">
				<input name="monday" type="checkbox" value="Monday"> M
			  </label>
			  <label class="btn btn-primary">
				<input name="tuesday" type="checkbox" value="Tuesday"> T
			  </label>
			  <label class="btn btn-primary">
				<input name="wednesday" type="checkbox" value="Wednesday"> W
			  </label>
			  <label class="btn btn-primary">
				<input name="thursday" type="checkbox" value="Thursday"> Th
			  </label>
			  <label class="btn btn-primary">
				<input name="friday" type="checkbox" value="Friday"> F
			  </label><span class="space"></span>
			  <label class="btn btn-primary">
				<input name="saturday" type="checkbox" value="Saturday"> Sa
			  </label>
			</div>
			<select name="open" class="dropDown">
					<option value="6:00 am">6:00 am</option>
					<option value="6:30 am">6:30 am</option>
					<option value="7:00 am">7:00 am</option>
					<option value="7:30 am">7:30 am</option>
					<option value="8:00 am">8:00 am</option>
					<option value="8:30 am">8:30 am</option>
					<option value="9:00 am" selected="">9:00 am</option>
					<option value="9:30 am">9:30 am</option>
					<option value="10:00 am">10:00 am</option>
					<option value="10:30 am">10:30 am</option>
					<option value="11:00 am">11:00 am</option>
					<option value="11:30 am">11:30 am</option>
					<option value="12:00 pm">12:00 pm</option>
					<option value="12:30 pm">12:30 pm</option>
					<option value="1:00 pm">1:00 pm</option>
					<option value="1:30 pm">1:30 pm</option>
					<option value="2:00 pm">2:00 pm</option>
					<option value="2:30 pm">2:30 pm</option>
					<option value="3:00 pm">3:00 pm</option>
					<option value="3:30 pm">3:30 pm</option>
					<option value="4:00 pm">4:00 pm</option>
					<option value="4:30 pm">4:30 pm</option>
					<option value="5:00 pm">5:00 pm</option>
					<option value="5:30 pm">5:30 pm</option>
					<option value="6:00 pm">6:00 pm</option>
					<option value="6:30 pm">6:30 pm</option>
					<option value="7:00 pm">7:00 pm</option>
					<option value="7:30 pm">7:30 pm</option>
					<option value="8:00 pm">8:00 pm</option>
					<option value="8:30 pm">8:30 pm</option>
					<option value="9:00 pm">9:00 pm</option>
					<option value="9:30 pm">9:30 pm</option>
					<option value="10:00 pm">10:00 pm</option>
					<option value="10:30 pm">10:30 pm</option>
					<option value="11:00 pm">11:00 pm</option>
					<option value="11:30 pm">11:30 pm</option>
					<option value="12:00 am">12:00 am</option>
					<option value="12:30 am">12:30 am</option>
					<option value="1:00 am">1:00 am</option>
					<option value="1:30 am">1:30 am</option>
					<option value="2:00 am">2:00 am</option>
					<option value="2:30 am">2:30 am</option>
					<option value="3:00 am">3:00 am</option>
					<option value="3:30 am ">3:30 am</option>
					<option value="4:00 am">4:00 am</option>
					<option value="4:30 am">4:30 am</option>
					<option value="5:00 am">5:00 am</option>
					<option value="5:30 am">5:30 am</option>
			</select>
			<select name="close" class="dropDown">
					<option value="6:00 am">6:00 am</option>
					<option value="6:30 am">6:30 am</option>
					<option value="7:00 am">7:00 am</option>
					<option value="7:30 am">7:30 am</option>
					<option value="8:00 am">8:00 am</option>
					<option value="8:30 am">8:30 am</option>
					<option value="9:00 am" selected="">9:00 am</option>
					<option value="9:30 am">9:30 am</option>
					<option value="10:00 am">10:00 am</option>
					<option value="10:30 am">10:30 am</option>
					<option value="11:00 am">11:00 am</option>
					<option value="11:30 am">11:30 am</option>
					<option value="12:00 pm">12:00 pm</option>
					<option value="12:30 pm">12:30 pm</option>
					<option value="1:00 pm">1:00 pm</option>
					<option value="1:30 pm">1:30 pm</option>
					<option value="2:00 pm">2:00 pm</option>
					<option value="2:30 pm">2:30 pm</option>
					<option value="3:00 pm">3:00 pm</option>
					<option value="3:30 pm">3:30 pm</option>
					<option value="4:00 pm">4:00 pm</option>
					<option value="4:30 pm">4:30 pm</option>
					<option value="5:00 pm">5:00 pm</option>
					<option value="5:30 pm">5:30 pm</option>
					<option value="6:00 pm">6:00 pm</option>
					<option value="6:30 pm">6:30 pm</option>
					<option value="7:00 pm">7:00 pm</option>
					<option value="7:30 pm">7:30 pm</option>
					<option value="8:00 pm">8:00 pm</option>
					<option value="8:30 pm">8:30 pm</option>
					<option value="9:00 pm">9:00 pm</option>
					<option value="9:30 pm">9:30 pm</option>
					<option value="10:00 pm">10:00 pm</option>
					<option value="10:30 pm">10:30 pm</option>
					<option value="11:00 pm">11:00 pm</option>
					<option value="11:30 pm">11:30 pm</option>
					<option value="12:00 am">12:00 am</option>
					<option value="12:30 am">12:30 am</option>
					<option value="1:00 am">1:00 am</option>
					<option value="1:30 am">1:30 am</option>
					<option value="2:00 am">2:00 am</option>
					<option value="2:30 am">2:30 am</option>
					<option value="3:00 am">3:00 am</option>
					<option value="3:30 am ">3:30 am</option>
					<option value="4:00 am">4:00 am</option>
					<option value="4:30 am">4:30 am</option>
					<option value="5:00 am">5:00 am</option>
					<option value="5:30 am">5:30 am</option>
			</select>
			<button type="button" name="add-hours" value="Add Hours" class="addHours" onclick="addHours()"><span>Add Hours</span></button>
		</div>	
		<div class="credentials">
			Deals and specials:<br><br>
			<textarea name="specials" class="specials non-required" ></textarea>
		</div>
		<div class="footer">
			<input type="submit" name="submit" value="Register" class="button" onclick="registerUser()"/>
			<input type="button" name="cancel" class="button" value="Cancel" style="margin-left: 15px" onclick="top.location.href='login.php';">
		</div>
	</div>
	</form>
	

</div>
</body>
</html>