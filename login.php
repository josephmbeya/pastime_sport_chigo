<?php include('server.php')  ?>
<!DOCTYPE html>
<html>
<head>    
<title>patime sports</title>
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
<h1>Pastime Sports Membership Login</h1>
</div>
<div class="w3ls-form">
<form action="login.php" method="post">
	    <p><a href="register.php">REGISTER</a></p><br/>
		<div class="w3l-last-grid1">
			<div class="w3l-grid1">
				<label class="text">User Name</label>
				<div class="w3l-div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" name="username" placeholder="username" required=""/>
				</div>
			</div> 
			<div class="w3l-grid2">
			<label class="text">Password</label>
			<div class="w3l-div">
				<i class="" aria-hidden="true"></i>
				<input type="password" name="password" placeholder="password" required=""/>
			</div>
			</div>
			<div class="">
			<label class="text">email</label>
			<div class="w3l-div">
				<i class="" aria-hidden="true"></i>
				<input type="email" name="email" placeholder="email" required=""/>
			</div>
			</div>
			<div class="clear"></div>
		</div>	
		
		<div class="clear"></div>
		<div class="w3ls-submit">
			<input type="submit" id="submit" name="login_user" value="Login">
			<span id="display"></span>
			<input type="reset" value="clear">
			
		</div>
		<p><a href="reset_password.php">FORGOT PASSWORD</a></p>
		<p><a href="setup.php">Create Database</a></p>
</form>
</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
<script type='text/javascript'>
    var timer;
    function countDown(i, callback){
        timer= setInterval(function{
            document.getElementById("display").innerHTML= "please try again after" + i;
            i-- || (clearInterval(timer), callback());
        }, 1000)
    }
    $(function () {
        $('#submit').oncick(function () {
            if($(this).val() == 3) {                                  
                     countDown(180, function{
                            alert("you can now try to login")                             
                     });                              
            }
        });
    });
</script>
</body>
</html>