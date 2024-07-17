<?php include('server.php')  ?>
<?php

 if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
  } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/icons/favicon.png"/>
        <style type="text/css">
                input, textarea  { font-family: courier new; font-size: 12px; }
                #content         { width:800px; text-align:left; margin-left:20px; }

                #chatwindow      { border:1px solid #aaaaaa; padding:4px; background:#232D2F; color:white;}
                #chatnick        { border: none; border-bottom:1px solid #aaaaaa; padding:4px; background:#57767F;}
                #chatmsg         { border: none; border-bottom:1px solid #aaaaaa; padding:4px; background:#57767F; }

                #info            { text-align:left; padding-left:0px; font-family:arial; }
                #info td         { font-size:12px; padding-right:10px; color:#DFDFDF;  }
                #info .small     { font-size:10px; padding-left:10px; padding-right:0px; }

                #info a          { text-decoration:none; color:white; }
                #info a:hover    { text-decoration:underline; color:#CF9700; }
        </style>
        <title>pastime sports</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="css/style1.css" rel="stylesheet">
        <link href="fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
        <script src="js/instafeed.min.js" type="text/javascript"></script>
        <script src="js/custom2.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page">
            <!---header top---->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- logged in user information -->
                        <?php  if (isset($_SESSION['username'])) : ?>
    	                                <p><strong><?php echo $_SESSION['username']; ?> </p>                             
                                    <?php endif ?>
                        <?php 

                                $handle = fopen("counter.txt", "r");
                                if(!$handle){	
                                echo "could not open the file" ;
                                }
                                else {	
                                         $counter = (int ) fread($handle,20);
                                         fclose ($handle);
                                        $counter++;
                                        echo"<p> <strong> YOU HAVE VISITED THIS SITE ". $counter . " TIMES </strong></p> " ;
                                        $handle = fopen("counter.txt", "w" );
                                        fwrite($handle,$counter) ;
                                        fclose ($handle) ;
                                }
                        ?>                       
                        </div>
                        <div class="col-md-6">
                            <div class="social-grid">
                            <p><a href="index.php?logout='1'" style="color: black; font-size:20px;">logout</a></strong></p> 
                            </div>
                            <div class="text-right"><a href="donation.php" style="color: green; font-size:20px;">DONATE</a></strong></div>
                        </div>                       
                    </div>
                </div>
            </div>
            <!--header--->
            <header class="header-container">
                <div class="container">                        
                    <div class="top-row">                            
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div id="logo">                                 
                                    <!--<a href="home.html"><img src="images/logo.png" alt="logo"></a>-->
                                    <a href="home.html">Pastime Sports</a>
                                </div>                       
                            </div>
                            <div class="col-sm-6 visible-sm">
                            <div class="text-right"><button type="button" class="book-now-btn">Book Now</button></div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            <li><a  data-hover="Home" class="active"><span>Home</span></a></li>
                                            <li><a data-hover="Records"  href="records.php"><span>Annual Membership</span></a></li>                                            
                                            <li><a data-hover="Gallery"  href="gallery.php"><span>Gallery</span></a></li> 
                                            <li><a data-hover="forum"  href="forum.php"><span>FORUM</span></a></li>                                                                                                                               
                                        </ul>                                                                                     
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                                <div class="text-right">                                 
                                <?php 
					          $user_check_query = "SELECT E_DATE FROM member";
							  $result = mysqli_query($db, $user_check_query);
							  if(mysqli_num_rows($result) > 0){
								$user = mysqli_fetch_assoc($result);
								$th = $user['E_DATE'];
								//echo $th;
							  }
							  
							
                              /* $date = strtotime($user['S_DATE']);
                               $remaining = $date - time();
                               $days_remaining = floor($remaining / 86400);
                               $hours_remaining = floor(($remaining % 86400) / 3600);
                               $minutes_remaining = floor(($remaining % 3600) / 60);
                               $seconds_remaining = ($remaining % 60);
							   echo "<p>$days_remaining <span style='font-size:.8em;'>DAYS</span> $hours_remaining <span style='font-size:.8em;'>HOURS</span> $minutes_remaining <span style='font-size:.8em;'>MINUTES</span></p>";
							   */
                    ?>
				<div id='countdown'>	
				<script type = "text/javascript">
				        //let get todays date here
                        var today = new Date();
                        var DD = today.getDate();
                        var MM = today.getMonth()+1; //January is 0!
                        var YYYY = today.getFullYear();
                        //let get the Difference in Sec btw the two dates
						var _DateFromDBProgEndDate = '<?php echo $th; ?>';
						//alert( _DateFromDBProgEndDate);
                        var ProgEndTime = new Date(_DateFromDBProgEndDate);
                        var TodayTime = new Date();
                        var differenceTravel = ProgEndTime.getTime()- TodayTime.getTime() ;
						var seconds = Math.floor((differenceTravel) / (1000));
						//alert();
                        ////////////////////////////////
                        var SecDiffFromToday = seconds;
                        var seconds = SecDiffFromToday;
                        function timer() {
                                     var days        = Math.floor(seconds/24/60/60);
                                     var hoursLeft   = Math.floor((seconds) - (days*86400));
                                     var hours       = Math.floor(hoursLeft/3600);
                                     var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                                     var minutes     = Math.floor(minutesLeft/60);
                                     var remainingSeconds = seconds % 60;
                                     if (remainingSeconds < 10) {
                                                      remainingSeconds = "0" + remainingSeconds; 
                                      }
                                     document.getElementById('countdown').innerHTML = "Membership:"+ days + " days left";
                                     //document.getElementById('countdown').innerHTML = days;
                                     //document.getElementById('dhour').innerHTML =hours;
                                     //document.getElementById('dmin').innerHTML =minutes;
                                     //document.getElementById('dsecond').innerHTML =remainingSeconds;



                                    if (seconds == 0) {
                                                  clearInterval(countdownTimer);
                                                  document.getElementById('countdown').innerHTML = "Completed";
                                    } else {
                                                days--;
                                    }
                         }
                         var countdownTimer = setInterval('timer()', 1000);
                     </script>               
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <!--end-->
            <div id="myCarousel1" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel1" data-slide-to="1"></li>
                    <li data-target="#myCarousel1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active"> <img src="images/joust-banner.jpg" style="width:100%; height: 500px" alt="First slide">
                        <div class="carousel-caption">
                            <h1>WELCOME TO PASTIME SPORTS</h1>                           
                        </div>
                    </div>
                    <div class="item"> <img src="images/joust_0.jpg" style="width:100%; height: 500px" alt="Second slide">
                        <div class="carousel-caption">
                            <h1>JOUSTING</h1>
                        </div>
                    </div>
                    <div class="item"> <img src="images/real-banner.jpg" style="width:100%; height: 500px" alt="Third slide">
                        <div class="carousel-caption">
                            <h1>REAL TENNIS</h1>
                        </div>
                    </div>

                </div>
                <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <img src="images/icons/left-arrow.png" onmouseover="this.src = 'images/icons/left-arrow-hover.png'" onmouseout="this.src = 'images/icons/left-arrow.png'" alt="left"></a>
                <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="images/icons/right-arrow.png" onmouseover="this.src = 'images/icons/right-arrow-hover.png'" onmouseout="this.src = 'images/icons/right-arrow.png'" alt="left"></a>


            </div>
            <div class="clearfix"><br/><br/><br/><br/>
                <!--end-->
            <section class="image-head-wrapper">
                <div class="inner-wrapper">
                    <h1>About us</h1>
                </div>
            </section>
            <div class="clearfix"></div>


            <section class="about-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 about-left">
                            <p>what <label>pastime </label> sports  <span> is all about</span></p>
                        </div>
                        <div class="col-md-7 about-right">
                            <h3>Focused on no longer Mainstreaming games</h3>
                            <p>We are a local communiy group that focuses on sports and games that are no longer mainstream,Our group was setup in Langley, Berkshire, UK and we are currently funded through sport England</p>
                            <ul class="list-unstyled list-inline">
                                <li>We currently have 130 active members who take part in great deal of activities during the week.</li>
                                <li>JOUSTING, a sport of kings. Since the 10th century, knights have been drawn to jousting.</li>
                                <li>a sport that showcases the finely-honed skills and horsemanship of knights.</li>
                                <li>REAL TENNIS, sometimes called"the sport of kings" this is the original racquet sports from which games of tennis originate.</li>
                                <li>the UNITED STATES call it court tennis and formerly called Royal tennis in England.</li>
                            </ul>
                            <span>pastime sports puts its main focus on these games to make sure future generations dont forget their heritage</span>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </section>
           <!---footer--->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 width-set-50">
                            <div class="footer-details">
                                    <h4>Subscribe to Our Newsletter</h4>
                                    <form action="index.php" method="post">                           
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="">                           
                                        <input type="submit" name="subscribe_newsletter" class="submit-btn" value="Subscribe">
                                    </form>                                
                                <div class="input-group" id="subscribe">
                                        <h4>CONTACT US</h4><br/>
                                        <ul class="list-unstyled footer-contact-list">
                                            <li>
                                                <i class="fa fa-map-marker fa-lg"></i>
                                                <p>701 Langley, Berkshire, UK.</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone fa-lg"></i>
                                                <p><a href="tel:+1-202-555-0100"> +1-202-555-0100</a></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope-o fa-lg"></i>
                                                <p><a href="#"> pastimesports@info.com</a></p>
                                            </li>
                                        </ul>
                                        
                                </div>
                                <div class="footer-social-icon">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>                           
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 width-50 width-set-50">
                            <div class="footer-details">
                                <h4></h4>
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="footer-details">
                                <h4>ONLINE CHAT</h4>
                                <div class="row">
                                    <div class="instagram-images">
                                    <p id="name-area"></p>                                   								
								<div class="single-bottom comment-form">
                                <div id="content">
            <textarea id="chatwindow" rows="19" cols="95" readonly></textarea><br>

            <input id="chatnick" type="text" size="9" maxlength="10" placeholder="username">&nbsp;
            <input id="chatmsg" type="text" size="80" maxlength="80"  onkeyup="keyup(event.keyCode);" placeholder="message">
            <input type="button" value="SEND" onclick="submit_msg();" style="cursor:pointer;border:1px solid black;"><br><br>
        </div>
							</div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="copyright">
                        
                        &copy; 2018 All right reserved.Pastime Sports 
                    </div>

                </div>
            </footer>

            <!--back to top--->
            <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                <span>Top</span>
            </a>

        </div>
    </body>
</html>
<script type="text/javascript">
/* most simple ajax chat script (www.linuxuser.at) (GPLv2) */
var nick_maxlength=10;
var http_request=false;
var http_request2=false;
var intUpdate;

/* http_request for writing */
function ajax_request(url){http_request=false;if(window.XMLHttpRequest){http_request=new XMLHttpRequest();if(http_request.overrideMimeType){http_request.overrideMimeType('text/xml');}}else if(window.ActiveXObject){try{http_request=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{http_request=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
if(!http_request){alert('Giving up :( Cannot create an XMLHTTP instance');return false;}
http_request.onreadystatechange=alertContents;http_request.open('GET',url,true);http_request.send(null);}
function alertContents(){if(http_request.readyState==4){if(http_request.status==200){rec_response(http_request.responseText);}else{}}}

/* http_request for reading */
function ajax_request2(url){http_request2=false;if(window.XMLHttpRequest){http_request2=new XMLHttpRequest();if(http_request2.overrideMimeType){http_request2.overrideMimeType('text/xml');}}else if(window.ActiveXObject){try{http_request2=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{http_request2=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
if(!http_request2){alert('Giving up :( Cannot create an XMLHTTP instance');return false;}
http_request2.onreadystatechange=alertContents2;http_request2.open('GET',url,true);http_request2.send(null);}
function alertContents2(){if(http_request2.readyState==4){if(http_request2.status==200){rec_chatcontent(http_request2.responseText);}else{}}}

/* chat stuff */
chatmsg.focus()
var show_newmsg_on_bottom=1;     /* set to 0 to let new msg´s appear on top */
var waittime=3000;        /* time between chat refreshes (ms) */

intUpdate=window.setTimeout("read_cont();", waittime);
chatwindow.value = "loading...";

function read_cont()         { zeit = new Date(); ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds(); ajax_request2("chat.txt?x=" + ms); }
function display_msg(msg1)     { chatwindow.value = msg1.trim(); }
function keyup(arg1)         { if (arg1 == 13) submit_msg(); }
function submit_msg()         { clearTimeout(intUpdate); if (chatnick.value == "") { check = prompt("please enter username:"); if (check === null) return 0; if (check == "") check="..."; chatnick.value=check; } if (chatnick.value.length > nick_maxlength) chatnick.value=chatnick.value.substring(0,nick_maxlength); spaces=""; for(i=0;i<(nick_maxlength-chatnick.value.length);i++) spaces+=" "; v=chatwindow.value.substring(chatwindow.value.indexOf("\n")) + "\n" + chatnick.value + spaces + "| " + chatmsg.value; if (chatmsg.value != "") chatwindow.value=v.substring(1); write_msg(chatmsg.value,chatnick.value); chatmsg.value=""; intUpdate=window.setTimeout("read_cont();", waittime);}
function write_msg(msg1,nick1)     { ajax_request("w.php?m=" + escape(msg1) + "&n=" + escape(nick1)); }
function rec_response(str1)     { }

function rec_chatcontent(cont1) {
    if (cont1 != "") {
        out1 = unescape(cont1);
        if (show_newmsg_on_bottom == 0) { out1 = ""; while (cont1.indexOf("\n") > -1) { out1 = cont1.substr(0, cont1.indexOf("\n")) + "\n" + out1; cont1 = cont1.substr(cont1.indexOf("\n") + 1); out1 = unescape(out1); } }
        if (chatwindow.value != out1) { display_msg(out1); }
        intUpdate=window.setTimeout("read_cont()", waittime);
    }
}
</script>
