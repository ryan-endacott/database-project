<?php
//var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">	</script>
</head>
<style>
	html, body{
		width: 100% !important;
		height: 100% !important;
		padding: 0;
		margin: 0;
	}
</style>
<body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<div id="wrapper-login">

	<div class="top">
		<span class="topBanner"></span>
		<h1 class="pageTitle">I'm Bored</h1>	
	</div><br>
	<button id="showr" class="start-button">Click here to get started!</button>
	<div id="login-input" style="display: none;" >
	<form name="login" class="login-form"  action= ""<?= $_SERVER['PHP_SELF'] ?>"" method="post">

			<div class="header">
				<h1>I'm Bored</h1>
				<span class="header">Please login or register to get started!</span><hr>
			</div>
		
			<div class="login-credentials">
				<input type="text" name="user" placeholder="Username" class="login-box" title="Please provide your username">
			</div>
			<div class="login-credentials">
				<input  type="password" name="pwd"placeholder="Password" class= "login-box" title="Please provide your password">
				
			</div>
			<div class="forgot-login"><a href='' onclick="emailReset()">Forgot your username or password?</a></div><br><br>
			<div class="login-footer">
				<button id="hidr" class="login-button" style="float: right;">Close</button>
				<input type="submit" name="submit" value="Login" class="login-button" />
				<a class="login-register" href="info.php" >Register</a>
			</div>
	</form>
	</div>

</div>
	<script>
	$(function() {
		$( document ).tooltip({
			show: 'bounce, slow',
			});
	});

	function emailReset()
	{
	var x;

	var username=prompt("Please provide your Username or E-mail address","Email/Username");

	if (username!=null)
	  {
	  //alert("Thank you " + person + ", you should be receiving an e-mail shortly with instuctions on how to reset your password");
	  document.getElementById("demo").innerHTML=x;
	  }
	}
	
	$( "#showr" ).click(function() {
		  $( "#login-input" ).first().show(  function showNext() {
			$( this ).next( "login-input" ).show( showNext );
			$("#showr").html('Login or register!');
		  });
		});
		 
		$( "#hidr" ).click(function() {
			$( "#login-input" ).hide( 300 );
		});
	</script>
</body>
</html>