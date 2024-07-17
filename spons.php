
<?php include('server.php') ?>
<?php
                    //gather the topics
         function mysqli_result($res,$row,$col=0){
			$numrows = mysqli_num_rows($res);
			if($numrows && $row =0){
							mysqli_data_seek($res,$row);
							$resrow = (is_numeric($col))? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
							if(isset($resrow[$col])){
									return $resrow[$col];
							}
			}
			return false;
}
$get_sponsors = "SELECT SPONS_ID, SPONS_NAME FROM sponsor ORDER BY SPONS_ID DESC";
$topic_result = mysqli_query($db, $get_sponsors) or die(mysqli_error());
if (mysqli_num_rows($topic_result) < 1) {
				//there are no topics, so say so
				$display_block = "<P><em>No topics exist.</em></p>";
} else {
				//create the display string
				$display_block = "
								 <table cellpadding=3 cellspacing=1 border=1>
								 <tr>
									  <th align=center>SPONSOR ID</th>
									  <th align=center>SPONSOR NAME</th>
								 </tr>";

				while ($topic_info = mysqli_fetch_array($topic_result)) {
								   $spons_id = $topic_info['SPONS_ID'];
								   $spons_name = stripslashes($topic_info['SPONS_NAME']);
								  // $topic_create_time = $topic_info['F_DATE'];
								   //$topic_owner = stripslashes($topic_info['F_OWNER']);

								   //get number of posts
								   //$get_num_posts = "SELECT COUNT(F_ID) FROM forum WHERE F_ID = $topic_id";
								  // $post_result = mysqli_query($db, $get_num_posts)or die(mysqli_error());
								   //$num_posts = mysqli_result($post_result,0,COUNT('F_ID'));

								   //add to display
								   $display_block .= "
													   <tr>
													   	 <td>$spons_id</td>
														 <td>$spons_name</td>
													   </tr>";
				  }
				  //close up the table
				  $display_block .= "</table>";
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>PASTIME SPORTS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo">
					
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
    	                     <p><strong><?php echo $_SESSION['username']; ?> <a href="index.php?logout='1'" style="color: yellow;">logout</a></strong></p>
                             <p></P>
                            <?php endif ?>
				</div>
				<a href="#menu"><span>Menu</span></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>					
					<li><a href="forum_main.php">forum</a></li>
					<li><a href="spons.php">sponsors</a></li>
					<li><a href="records.php">records</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main" class="container">

				<!-- Content -->
					<h2>PASTIME SPORTS SPONSORS</h2>
					<h1>OUR CURRENT SPONSORS</h1>
                    <?php print $display_block; ?>
					<P>Would you like to become one of our sponsors to make donations?</p>
					<h1>ENTER YOUR ORGANIZATIONS DETAILS TO REGISTER</h1>
					<form action="spons.php" method="post">
					<?php include('errors.php'); ?>						
						<div class="">
							<label for="name">NAME OF YOUR ORGANIZATION</label>
							<input name="name" id="name" type="text" placeholder="">
						</div><br/>												
						<ul class="actions">
							<li><button type="submit" class="btn" name="reg_spons">register</button></li>
						</ul>
					</form>
					
			</div>

				<hr class="major" />

				

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h2>Contact Us</h2>

					

					<ul class="icons">
						<li><a href="#" class="icon round fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>

					<div class="copyright">
						&copy; pastime sports 2018
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>