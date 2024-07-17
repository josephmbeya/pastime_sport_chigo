<?php include('server.php')  ?>
<!DOCTYPE html>
<html>
<head>    
<title>pastime sports</title>
<!-- meta_tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Library Membership form A Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta_tag_Keywords-->
<!--css_files-->
	<link rel="stylesheet" href="css/jquery-ui.css"/>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-->
	<link rel="stylesheet" href="css/font-awesome.css"><!--font_wesome_icons-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet"><!--online_fonts-->
	<link href="//fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet"><!--online_fonts-->
<!--//css_files-->
</head>
<body>
<div class="w3l-head">
<h1>Pastime Sports Membership Registration</h1>
</div>
<div class="w3ls-form">
<form action="register.php" method="post">
<?php include('errors.php')  ?>
	    <p>Already a member? <a href="login.php">Login</a></p><br/>
		<div class="w3l-last-grid1">
			<div class="w3l-grid1">
				<label class="text">First name</label>
				<div class="w3l-div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" name="fname" placeholder="first name" required="">
				</div>
			</div> 
			<div class="w3l-grid2">
			<label class="text">Last name</label>
			<div class="w3l-div">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="lname" placeholder="last name" required="">
			</div>
			</div>
			<div class="clear"></div>
		</div>	
		<div class="w3l-last-grid1">
			<div class="w3l-grid1">
				<label class="text">Address</label>
				<div class="w3l-div">
					<i class="fa fa-location-arrow" aria-hidden="true"></i>
					<input type="text" name="address" placeholder="current address" required="">					
				</div>
			</div>	
			<div class="w3l-grid2">
				<label class="text">date of birth</label>
				<div class="w3l-div">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<input type="date" class="date" id="datepicker" name="mdob" placeholder="date of birth" required="">
				</div>	
			</div>	
			<div class="clear"></div>
		</div>
		<div class="w3l-last-grid1">
			<div class="w3l-grid1">
				<label class="text">Your Email</label>
				<div class="w3l-div">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<input type="email" name="email" placeholder="e-mail" required="">
				</div>
			</div>
			<div class="w3l-grid2">
				<label class="text">Username</label>
				<div class="w3l-div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" name="username" placeholder="username" required="">
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="w3l-last-grid1">
			<div class="w3l-grid1">	
				<label class="text">password</label>
				<div class="w3l-div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="password" name="password_1" placeholder="password" required="">
				</div>
			</div>
			<div class="w3l-grid2">	
				<label class="text">Confirm Password</label>
				<div class="w3l-div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="password" name="password_2" placeholder="confirm password" required="">
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="w3l-right-grid1">
			<div class="w3l-grid1">
				<label class="text">start date</label>
				<div class="w3l-div">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<input type="date" class="date" id="datepicker" name="sdate" placeholder="membership start" required="">
				</div>
			</div>
			<div class="w3l-grid2">
				<label class="text">End Date</label>
				<div class="w3l-div">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<input type="date" class="date" id="datepicker" name="edate" placeholder="membership end" required="">
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="w3l-right-grid1">
		<div class="w3l-grid1">
			<label class="text">Select Membership <span></span></label>
				<div class="w3l-div">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					<select class="form-contro3" name="memb" required="">
						<option value="Annual">annual</option>						
					</select>
				</div>
		</div>	
			<label class="text">which sport</label>
			<div class="w3l-grid2">
				<div class="w3l-div">
					<i class="fa fa-book" aria-hidden="true"></i>
					<select class="form-contro2" name="sport" required="">
						<option>sport</option>
						<option value="Jousting">Jousting</option>
						<option value="Real Tennis">Real Tennis</option>						
					</select>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="w3ls-submit">
			<input type="submit" name="reg_user"value="Register">
			<input type="reset" value="clear">
		</div>
</form>
</div>
<footer>&copy; 2018 Pastime Sports. All Rights Reserved </footer>

<!-- Default-JavaScript --> <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
		});
	</script>
<!-- //Calendar -->
</body>
</html>